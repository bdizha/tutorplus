<?php

require_once dirname(__FILE__) . '/../lib/assignment_groupGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/assignment_groupGeneratorHelper.class.php';

/**
 * assignment_group actions.
 *
 * @package    ecollegeplus
 * @subpackage assignment_group
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assignment_groupActions extends autoAssignment_groupActions
{

    public function preExecute()
    {
        if (!$course_id = $this->getUser()->getMyAttribute('course_show_id', null))
        {
            $this->redirect("@course");
        }
        $this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find(array($course_id)), sprintf('Object Course does not exist (%s).', $course_id));
        parent::preExecute();
    }

}
