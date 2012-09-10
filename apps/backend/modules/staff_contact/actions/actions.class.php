<?php

require_once dirname(__FILE__) . '/../lib/staff_contactGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/staff_contactGeneratorHelper.class.php';

/**
 * staff_contact actions.
 *
 * @package    ecollegeplus
 * @subpackage staff_contact
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staff_contactActions extends autoStaff_contactActions
{

    public function preExecute()
    {
        $staffId = $this->getUser()->getMyAttribute('staff_show_id', null);
        $this->staff = StaffTable::getInstance()->find($staffId);
        $this->redirectUnless($this->staff, "@staff");
        parent::preExecute();
    }

    public function executeIndex(sfWebRequest $request)
    {
        $staffContact = StaffContactTable::getInstance()->findOneBystaffId($this->staff->getId());
        if ($staffContact)
        {
            $this->redirect('@staff_contact_edit?id=' . $staffContact->getId());
        }
        $this->redirect('@staff_contact_new');
    }

}
