<?php

/**
 * profile_publication module helper.
 *
 * @package    tutorplus.org
 * @subpackage profile_publication
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_publicationGeneratorHelper extends BaseProfile_publicationGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/profile_publication", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/profile_publication", array("popup_url" => "/profile_publication/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" ' . '" value="Cancel"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" ' . '" value="Done"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToPublicationEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/profile/publication/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToPublicationDelete($object, $params) {
        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'profile_publication_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

}