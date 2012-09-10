<?php

/**
 * student_contact module helper.
 *
 * @package    ecollegeplus
 * @subpackage student_contact
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class student_contactGeneratorHelper extends BaseStudent_contactGeneratorHelper
{

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/student_contact/new", array("class" => "new")) . '</li>';
    }

    public function linkToDelete($object, $params)
    {
        if ($object->isNew())
        {
            return '';
        }
        return '<li class="sf_admin_action_delete">'.link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
    }

    public function linkToCancel($object, $params)
    {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/backend.php/student\'"/>';
    }

    public function linkToDone($object, $params)
    {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/backend.php/student\'"/>';
    }

    public function linkToSave($object, $params)
    {
        return '<li class="sf_admin_action_save"><input class="save" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }
    
    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_discussions",
                "Discussions" => "profile_discussions"
            )
        );
    }

    public function discussionLinks() {
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_discussions",
            "is_profile" => true
        );
    }
}