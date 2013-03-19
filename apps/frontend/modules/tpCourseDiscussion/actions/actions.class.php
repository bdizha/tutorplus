<?php

require_once dirname(__FILE__) . '/../lib/tpCourseDiscussionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpCourseDiscussionGeneratorHelper.class.php';

/**
 * tpCourseDiscussion actions.
 *
 * @package    tutorplus
 * @subpackage tpCourseDiscussion
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseDiscussionActions extends autoTpCourseDiscussionActions {

    public function preExecute() {
        parent::preExecute();
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course = CourseTable::getInstance()->find(array($courseId));
        $this->forward404Unless($this->course, sprintf('The requested course does not exist (%s).', $courseId));
        $this->helper->setCourse($this->course);
    	$this->courseDiscussions = DiscussionTable::getInstance()->findByCourseId($courseId);
    }

    public function executeIndex(sfWebRequest $request) {
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
                // save the Discussion
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

                $this->redirect('@tpCourseDiscussion_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);
                $this->redirect(array('sf_route' => 'tpCourseDiscussion_edit', 'sf_subject' => $discussion));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
