<?php

require_once dirname(__FILE__) . '/../lib/discussion_topicGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_topicGeneratorHelper.class.php';

/**
 * discussion_topic actions.
 *
 * @package    tutorplus
 * @subpackage discussion_topic
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topicActions extends autoDiscussion_topicActions {

  protected $discussionId = "";

  public function executeIndex(sfWebRequest $request) {
    $this->discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
    $this->forward404Unless($this->discussion = Doctrine_Core::getTable('Discussion')->find(array(
        $this->discussionId)), sprintf('Object Course does not exist (%s).', $this->getUser()->getMyAttribute('discussion_show_id', null)));

    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page')) {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function sendlEmail($object) {
    $toEmails = $object->getToEmails();
    $announcer = $object->getProfile();
    $mailer = new tpMailer();
    $mailer->setTemplate('new-discussion-topic');
    $mailer->setToEmails($toEmails);
    $mailer->addValues(array(
        "OWNER" => $announcer->getName(),
        "DISCUSSION_TOPIC" => $object->getMessage(),
        "DISCUSSION_TOPIC_LINK" => $this->getPartial('email_template/link', array(
            'title' => $this->generateUrl('discussion_topic_show', array("slug" => $object->getSlug()), 'absolute=true'),
            'route' => "@discussion_topic_show?slug=" . $object->getSlug())
        )));

    $mailer->send();
  }

  public function executeShow(sfWebRequest $request) {
    $this->forward404Unless($this->discussionTopic = $this->getRoute()->getObject());
    $this->getUser()->setMyAttribute('discussion_topic_show_id', $this->discussionTopic->getId());
    $this->getUser()->setMyAttribute('discussion_show_id', $this->discussionTopic->getDiscussionId());

    $this->course = $this->discussionTopic->getDiscussion()->getCourseDiscussion()->getCourse();
    if ($this->course->getId()) {
      $this->getUser()->setMyAttribute('course_show_id', $this->course->getId());
    }
    $this->replyForm = new DiscussionCommentForm();
    $this->messageForm = new DiscussionPostForm();
    $this->messageForm->setDefaults(array(
        "profile_id" => $this->getUser()->getId(),
        "discussion_topic_id" => $this->discussionTopic->getId()
    ));

    if ($this->discussionTopic->getDiscussionId()) {
      if ($this->getUser()->getType() == sfGuardUserTable::TYPE_STUDENT) {
        $studentId = $this->getUser()->getStudentId();
        $profileId = $this->getUser()->getId();

        $this->suggestedFollowers = DiscussionPeerTable::getInstance()->retrieveSuggestionsByStudentIdAndProfileId($studentId, $profileId, $this->discussionTopic->getDiscussionId());
      } elseif ($this->getUser()->getType() == sfGuardUserTable::TYPE_INSTRUCTOR) {
        $this->suggestedFollowers = null;
      }
    } else {
      $this->suggestedFollowers = null;
    }
  }

  public function executeNew(sfWebRequest $request) {
    $this->forward404Unless($this->discussion = Doctrine_Core::getTable('Discussion')->find(array(
        $this->getUser()->getMyAttribute('discussion_show_id', null))), sprintf('Object does not exist (%s).', $this->getUser()->getMyAttribute('discussion_show_id', null)));
    $this->form = $this->configuration->getForm();
    $this->discussion_topic = $this->form->getObject();
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($this->discussion = DiscussionTable::getInstance()->find(
        array(
            $this->getUser()->getMyAttribute('discussion_show_id', null)
        )), sprintf('Object does not exist (%s).', $this->getUser()->getMyAttribute('discussion_show_id', null)
        ));
    $this->form = $this->configuration->getForm();
    $this->discussion_topic = $this->form->getObject();

    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request) {
    $discussionTopic = $this->getRoute()->getObject();
    $request->checkCSRFProtection();
    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $discussionTopic)));
    if ($this->getRoute()->getObject()->delete()) {
      $this->getUser()->setFlash('notice', 'The topic was deleted successfully.');
    }

    $this->redirect('@discussion_show?slug=' . $discussionTopic->getDiscussion()->getSlug());
  }

  public function executeTopics(sfWebRequest $request) {
    $this->discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
    $this->forward404Unless($this->discussion = Doctrine_Core::getTable('Discussion')->find(array(
        $this->discussionId)), sprintf('Object Course does not exist (%s).', $this->getUser()->getMyAttribute('discussion_show_id', null)));

    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page')) {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  protected function buildQuery() {
    $tableMethod = $this->configuration->getTableMethod();
    $query = Doctrine_Core::getTable('DiscussionTopic')
        ->createQuery('a')
        ->addWhere("a.discussion_id = ?", $this->discussionId)
        ->addOrderBy("a.updated_at Desc");

    if ($tableMethod) {
      $query = Doctrine_Core::getTable('DiscussionTopic')->$tableMethod($query);
    }

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }

}
