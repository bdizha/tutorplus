<?php

require_once dirname(__FILE__) . '/../lib/discussionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussionGeneratorHelper.class.php';

/**
 * discussion actions.
 *
 * @package    tutorplus
 * @subpackage discussion
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussionActions extends autoDiscussionActions
{

    public function executeShow(sfWebRequest $request)
    {
        $this->discussion = $this->getRoute()->getObject();
        $this->forward404Unless($this->discussion);
        $this->getUser()->setMyAttribute('discussion_show_id', $this->discussion->getId());

        $course = $this->discussion->getCourseDiscussion()->getCourse();
        if ($course->getId())
        {
            $this->course = $course;
            $this->getUser()->setMyAttribute('course_show_id', $course->getId());
        }
    }

    public function executeIndex(sfWebRequest $request)
    {
        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
        {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // fetch discussions stats
        $this->discussionActivity = array();
        $this->discussionActivity["new_topics"] = DiscussionTopicTable::getInstance()->getNbNewTopics()->count();
        $this->discussionActivity["new_replies"] = DiscussionTopicReplyTable::getInstance()->getNbNewReplies()->count();
        $this->discussionActivity["new_messages"] = DiscussionTopicMessageTable::getInstance()->getNbNewMessages()->count();
        $this->discussionActivity["new_members"] = DiscussionMemberTable::getInstance()->getNbNewMembersJoined()->count();

        $this->discussionTopic = DiscussionTopicTable::getInstance()->getTopicWithRecentActivity();

        // pager
        if ($request->getParameter('page'))
        {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();
    }

    public function executeMembers(sfWebRequest $request)
    {
        $discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->discussion = DiscussionTable::getInstance()->find($discussionId);
    }

    public function sendEmail($object) {
        $toEmails = $object->getToEmails();
        $owner = $object->getUser();
        $mailer = new tpMailer();
        $mailer->setTemplate('new-discussion');
        $mailer->setToEmails($toEmails);
        $mailer->addValues(array(
            "OWNER" => $owner->getName(),
            "DESCRIPTION" => $object->getDescription(),
            "DISCUSSION_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('discussion_show', array("slug" => $object->getSlug()), 'absolute=true'),
                'route' => "@discussion_show?slug=" . $object->getSlug())
                )));

        $mailer->send();
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            try
            {
                $discussion = $form->save();

                // save the owner of this group
                $discussion->saveGroupOwner($this->getUser()->getId(), $this->getUser()->getName());
            }
            catch (Doctrine_Validator_Exception $e)
            {
                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors)
                {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }


            // send the descussion emails
            $this->sendEmail($discussion);
            
            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $discussion)));

            if ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@discussion_new');
            }
            else
            {
                $this->getUser()->setFlash('notice', $notice);
                $this->redirect(array('sf_route' => 'discussion_edit', 'sf_subject' => $discussion));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    protected function buildQuery()
    {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('Discussion')
            ->createQuery('d');

        if (true)
        {
            $userId = $this->getUser()->getMyAttribute('peer_show_id', null);
            if (!$userId)
            {
                $userId = $this->getUser()->getId();
            }

            $query
                ->innerJoin('d.Members dm')
                ->addWhere("dm.user_id = ?", $userId)
                ->addOrderBy("d.updated_at Desc");
        }

        if ($tableMethod)
        {
            $query = Doctrine_Core::getTable('Discussion')->$tableMethod($query);
        }

        $this->addSortQuery($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();

        return $query;
    }

}