<?php

require_once dirname(__FILE__) . '/../lib/discussion_groupGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_groupGeneratorHelper.class.php';

/**
 * discussion_group actions.
 *
 * @package    tutorplus.org
 * @subpackage discussion_group
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_groupActions extends autoDiscussion_groupActions {

  public function executeShow(sfWebRequest $request) {
    $this->discussionGroup = $this->getRoute()->getObject();
    $this->forward404Unless($this->discussionGroup);
    $this->getUser()->setMyAttribute('discussion_group_show_id', $this->discussionGroup->getId());

    $this->discussionGroup->setViewCount($this->discussionGroup->getViewCount() + 1);
    $this->discussionGroup->save();
    $course = $this->discussionGroup->getCourseDiscussionGroup()->getCourse();
    if ($course->getId()) {
      $this->course = $course;
      $this->getUser()->setMyAttribute('course_show_id', $course->getId());
    }
  }

  public function executeExplorer(sfWebRequest $request) {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    $this->discussionTopics = DiscussionTopicTable::getInstance()->findAll();

    // pager
    if ($request->getParameter('page')) {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeMy(sfWebRequest $request) {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    $this->discussionTopics = DiscussionTopicTable::getInstance()->findAll();

    // pager
    if ($request->getParameter('page')) {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeMembers(sfWebRequest $request) {
    $discussionGroupId = $this->getUser()->getMyAttribute('discussion_group_show_id', null);
    $this->discussionGroup = DiscussionGroupTable::getInstance()->find($discussionGroupId);
  }

  public function sendEmail($object) {
    $toEmails = $object->getToEmails();
    $owner = $object->getProfile();
    $mailer = new tpMailer();
    $mailer->setTemplate('new-discussion-group');
    $mailer->setToEmails($toEmails);
    $mailer->addValues(array(
        "OWNER" => $owner->getName(),
        "DESCRIPTION" => $object->getDescription(),
        "discussion_group_LINK" => $this->getPartial('email_template/link', array(
            'title' => $this->generateUrl('discussion_group_show', array("slug" => $object->getSlug()), 'absolute=true'),
            'route' => "@discussion_group_show?slug=" . $object->getSlug())
        )));

    $mailer->send();
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      try {
        $discussionGroup = $form->save();

        // save the owner of this group
        $discussionGroup->saveGroupOwner($this->getUser()->getId(), $this->getUser()->getName());
      } catch (Doctrine_Validator_Exception $e) {
        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
          $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      // send the descussion emails
      //$this->sendEmail($discussionGroup);

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $discussionGroup)));

      if ($request->hasParameter('_save_and_add')) {
        $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

        $this->redirect('@discussion_group_new');
      } else {
        $this->getUser()->setFlash('notice', $notice);
        $this->redirect(array('sf_route' => 'discussion_group_edit', 'sf_subject' => $discussionGroup));
      }
    } else {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  protected function buildQuery() {
    $tableMethod = $this->configuration->getTableMethod();
    $query = Doctrine_Core::getTable('DiscussionGroup')
        ->createQuery('d');

    $profileId = $this->getUser()->getMyAttribute('peer_show_id', null);
    if (!$profileId) {
      $profileId = $this->getUser()->getId();
    }

    $query->innerJoin('d.Peers dp')
        ->addWhere("dp.profile_id = ?", $profileId)
        ->addOrderBy("d.updated_at Desc");

    if ($tableMethod) {
      $query = Doctrine_Core::getTable('DiscussionGroup')->$tableMethod($query);
    }

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }

}
