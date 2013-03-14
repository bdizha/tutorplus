<?php

/**
 * tpProfileInterest module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileInterest
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileInterestGeneratorHelper extends BaseTpProfileInterestGeneratorHelper
{

    public function linkToInterestEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/profile/interest/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_interest"));
    }
    
}