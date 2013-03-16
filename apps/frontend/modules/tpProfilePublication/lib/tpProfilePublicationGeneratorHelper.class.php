<?php

/**
 * tpProfilePublication module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProfilePublication
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfilePublicationGeneratorHelper extends BaseTpProfilePublicationGeneratorHelper
{

    public function linkToPublicationEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/profile/publication/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToPublicationDelete($object, $params)
    {
        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'profile_publication_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

}