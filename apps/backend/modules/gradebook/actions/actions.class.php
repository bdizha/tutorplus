<?php

require_once dirname(__FILE__) . '/../lib/gradebookGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/gradebookGeneratorHelper.class.php';

/**
 * gradebook actions.
 *
 * @package    tutorplus
 * @subpackage gradebook
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gradebookActions extends autoGradebookActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $courseId = $this->getUser()->getMyAttribute('course_show_id', null);
        if ($courseId)
        {
            $this->forwardUnless($this->gradebook = GradebookTable::getInstance()->findOrCreateOneBy("course_id", $courseId), "course", "index");
            $this->getUser()->setMyAttribute('gradebook_show_id', $this->gradebook->getId());
            $this->course = $this->gradebook->getCourse();
            parent::executeIndex($request);
        }
        else
        {
            $this->forward("course", "index");
        }
    }

    public function executeGrades(sfWebRequest $request)
    {
        $courseId = $this->getUser()->getMyAttribute('course_show_id', null);
        if ($courseId)
        {
            $this->forwardUnless($this->gradebook = GradebookTable::getInstance()->findOneBy("course_id", $courseId), "course", "index");

            $this->getUser()->setMyAttribute('gradebook_show_id', $this->gradebook->getId());

            StudentGradebookItemTable::getInstance()->createDefaultStudentGradebookItems($this->gradebook);
            $this->course = $this->gradebook->getCourse();

            $this->form = new GradebookForm($this->gradebook);
        }
        else
        {
            $this->redirect("@course");
        }
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->gradebook = $this->getRoute()->getObject();
        $this->form = new GradebookForm($this->gradebook);

        $this->processForm($request, $this->form);
        $this->setTemplate('grades');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The students grades have been successfully.' : 'The students grades have been updated successfully.';

            try
            {
                $gradebook = $form->save();
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $gradebook)));
            $this->getUser()->setFlash('notice', $notice, false);
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
