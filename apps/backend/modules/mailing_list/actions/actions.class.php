<?php

require_once dirname(__FILE__) . '/../lib/mailing_listGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/mailing_listGeneratorHelper.class.php';

/**
 * mailing_list actions.
 *
 * @package    tutorplus
 * @subpackage mailing_list
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailing_listActions extends autoMailing_listActions
{

    public function executeChoose(sfWebRequest $request)
    {
        $this->module = $request->getParameter("module_name");
        $this->objectId = $request->getParameter("object_id");

        // fetch all mailing lists for now
        $this->mailingLists = MailingListTable::getInstance()->findAll();
        $this->currentMailingListIds = array();

        if ($request->getMethod() == "POST")
        {
            $notice = 'The mailing list(s) were added successfully.';
            try
            {
                $mailingLists = $request->getParameter('mailing_lists');

                // save mailing lists
                $this->currentMailingListIds = $this->saveOrGetObjectMailingLists($mailingLists, $this->module, $this->objectId);

                // send new mailing list subscription
            }
            catch (Doctrine_Validator_Exception $e)
            {
                $this->getUser()->setFlash('error', 'The mailing list(s) have not been added due to some errors.', false);
            }

            $this->getUser()->setFlash('notice', $notice, false);
        }
        else
        {
            // fetch the current mailings lists
            $this->currentMailingListIds = $this->saveOrGetObjectMailingLists(null, $this->module, $this->objectId);
        }
    }

    protected function saveOrGetObjectMailingLists($mailingListIds = null, $module, $objectId)
    {
        if ($module == MailingListTable::MODULE_STUDENT)
        {
            // fetch current mailing lists by student id
            $currentMailingListIds = array_keys(StudentTable::getInstance()->find($objectId)->getMailingLists());

            if (!$mailingListIds)
            {
                return $currentMailingListIds;
            }

            $toDelete = array_diff($currentMailingListIds, $mailingListIds);
            if (count($toDelete))
            {
                StudentMailingListTable::getInstance()->deleteByMailingListIdsAndStudentId($toDelete, $objectId);
            }

            $toAdd = array_diff($mailingListIds, $currentMailingListIds);
            if (count($toAdd))
            {
                foreach ($toAdd as $mailingListId)
                {
                    $studentMailingList = new StudentMailingList();
                    $studentMailingList->setStudentId($objectId);
                    $studentMailingList->setMailingListId($mailingListId);
                    $studentMailingList->save();
                }
            }
        }
        elseif ($module == MailingListTable::MODULE_INSTRUCTOR)
        {
            // fetch current mailing lists by instructor id
            $currentMailingListIds = array_keys(InstructorTable::getInstance()->find($objectId)->getMailingLists());
            
            if (!$mailingListIds)
            {
                return $currentMailingListIds;
            }

            $toDelete = array_diff($currentMailingListIds, $mailingListIds);
            if (count($toDelete))
            {
                InstructorMailingListTable::getInstance()->deleteByMailingListIdsAndInstructorId($toDelete, $objectId);
            }

            $toAdd = array_diff($mailingListIds, $currentMailingListIds);
            if (count($toAdd))
            {
                foreach ($toAdd as $mailingListId)
                {
                    $instructorMailingList = new InstructorMailingList();
                    $instructorMailingList->setInstructorId($objectId);
                    $instructorMailingList->setMailingListId($mailingListId);
                    $instructorMailingList->save();
                }
            }
        }
        elseif ($module == MailingListTable::MODULE_STAFF)
        {
            // fetch current mailing lists by staff id
            $currentMailingListIds = array_keys(StaffTable::getInstance()->find($objectId)->getMailingLists());

            if (!$mailingListIds)
            {
                return $currentMailingListIds;
            }

            $toDelete = array_diff($currentMailingListIds, $mailingListIds);
            if (count($toDelete))
            {
                StaffMailingListTable::getInstance()->deleteByMailingListIdsAndStaffId($toDelete, $objectId);
            }

            $toAdd = array_diff($mailingListIds, $currentMailingListIds);
            if (count($toAdd))
            {
                foreach ($toAdd as $mailingListId)
                {
                    $staffMailingList = new StaffMailingList();
                    $staffMailingList->setStaffId($objectId);
                    $staffMailingList->setMailingListId($mailingListId);
                    $staffMailingList->save();
                }
            }
        }

        return $mailingListIds;
    }

}
