<?php

/**
 * tpProfileQualification module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileQualification
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileQualificationGeneratorHelper extends BaseTpProfileQualificationGeneratorHelper
{

    public function qualificationBreadcrumbs()
    {
        $sfUser = sfContext::getInstance()->getUser();
        return array('breadcrumbs' => array(
                "Profile" => "profile/" . $sfUser->getProfile()->getSlug(),
                "Awards" => "profile_qualification"
            )
        );
    }

    public function qualificationLinks()
    {
        $sfUser = sfContext::getInstance()->getUser();
        $profileId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "currentParent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_qualifications",
            "slug" => $sfUser->getProfile()->getSlug(),
            "id" => $sfUser->getProfile()->getId(),
            "ignore" => !$sfUser->isCurrent($profileId)
        );
    }

    public function linkToQualificationEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/profile/qualification/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_qualification"));
    }

    public function linkToQualificationDelete($object, $params)
    {
        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'profile_qualification_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

}