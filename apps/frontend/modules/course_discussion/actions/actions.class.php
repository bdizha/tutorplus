<?php

require_once dirname(__FILE__) . '/../lib/course_discussionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/course_discussionGeneratorHelper.class.php';

/**
 * course_discussion actions.
 *
 * @package    tutorplus
 * @subpackage course_discussion
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_discussionActions extends autoCourse_discussionActions {

    public function preExecute() {
        parent::preExecute();
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course = CourseTable::getInstance()->find(array($courseId));

        $this->helper->setCourse($this->course);
        $this->forward404Unless($this->course, sprintf('Object Course does not exist (%s).', $courseId));
    }

    public function executeIndex(sfWebRequest $request) {
        // set the discussion module i.e for the menu to know what links to show
        $this->getUser()->setMyAttribute('discussion_module_id', DiscussionTable::MODULE_COURSE);

        $this->discussion = DiscussionTable::getInstance()->findOrCreateOneByCourse($this->course, $this->getUser()->getId());
        $this->getUser()->setMyAttribute('discussion_show_id', $this->discussion->getId());

        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
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
        if ($request->getParameter('page')) {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();
    }

    public function executeShow(sfWebRequest $request) {
        $this->discussion = $this->getRoute()->getObject();
        $this->forward404Unless($this->discussion);
        $this->getUser()->setMyAttribute('discussion_show_id', $this->discussion->getId());

        $courseDiscussion = $this->discussion->getCourseDiscussion();
        if ($courseDiscussion) {
            $this->getUser()->setMyAttribute('course_show_id', $courseDiscussion->getCourseId());
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            try {
                // save the discussion
                $discussion = $form->save();

                // save a course discussion
                $courseDiscussion = new CourseDiscussion();
                $courseDiscussion->setCourse($this->course);
                $courseDiscussion->setDiscussion($discussion);
                $courseDiscussion->save();
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $discussion)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@course_discussion_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);
                $this->redirect(array('sf_route' => 'course_discussion_edit', 'sf_subject' => $discussion));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    protected function buildQuery() {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('Discussion')
                ->createQuery('d');

        $query->innerJoin('d.CourseDiscussion cd')
                ->andWhere('cd.course_id = ?', $this->course->getId());

        if ($tableMethod) {
            $query = Doctrine_Core::getTable('Discussion')->$tableMethod($query);
        }

        $this->addSortQuery($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();

        return $query;
    }

}
