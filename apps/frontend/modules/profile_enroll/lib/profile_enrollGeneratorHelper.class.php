<?php

/**
 * profile_enroll module helper.
 *
 * @package    tutorplus.org
 * @subpackage profile_enroll
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_enrollGeneratorHelper extends Baseprofile_enrollGeneratorHelper
{
    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/\'"/>';
    }    
}