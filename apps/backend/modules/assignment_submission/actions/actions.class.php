<?php

require_once dirname(__FILE__) . '/../lib/assignment_submissionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/assignment_submissionGeneratorHelper.class.php';

/**
 * assignment_submission actions.
 *
 * @package    tutorplus
 * @subpackage assignment_submission
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assignment_submissionActions extends autoAssignment_submissionActions
{

    public function preExecute()
    {
        $this->assignment_id = $this->getUser()->getMyAttribute('assignment_show_id', null);
        parent::preExecute();
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            try
            {
                // save the generated file
                $assignmentSubmission = $form->save();
                $generatedFile = $form->getValue("generated_file");
                $generatedFile->save();

                // save the original file
                $assignmentSubmission->setOriginalFile($generatedFile->getSanitizedOriginalName());
                $assignmentSubmission->save();
            }
            catch (sfException $e)
            {
                throw $e;
            }
            $this->getUser()->setFlash('notice', 'Your file has been uploaded successfully.', false);
        }
        else
        {
            $this->getUser()->setFlash('error', 'The file has not been saved due to some errors.', false);
        }
    }

    protected function buildQuery()
    {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('AssignmentSubmission')
            ->createQuery('a')
            ->addWhere("a.assignment_id = ?", $this->assignment_id)
            ->addOrderBy("a.updated_at Desc");

        if ($this->getUser()->getType() == "Student")
        {
            $query->addWhere("a.user_id = ?", $this->getUser()->getId());
        }

        if ($tableMethod)
        {
            $query = Doctrine_Core::getTable('AssignmentSubmission')->$tableMethod($query);
        }

        $this->addSortQuery($query);
        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();
        return $query;
    }

}
