<?php

/**
 * tpProfileBiography module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileBiography
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileBiographyGeneratorHelper extends BaseTpProfileBiographyGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Profile" => "my_info",
                "Biography" => "profile_biography"
            )
        );
    }

    public function getLinks()
    {
        $sfUser = sfContext::getInstance()->getUser();
        $profileId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "currentParent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_biography",
            "slug" => $sfUser->getProfile()->getSlug(),
            "id" => $sfUser->getProfile()->getId(),
            "ignore" => !$sfUser->isCurrent($profileId)
        );
    }

    public function linkToPublicationEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/profile/publication/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_publication"));
    }

    public function linkToBookEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/profile/book/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_book"));
    }

    public function linkToInterestEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/profile/interest/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_interest"));
    }

    public function linkToAwardEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/profile/award/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_award"));
    }

    public function linkToAwardDelete($object, $params)
    {
        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'profile_award_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
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