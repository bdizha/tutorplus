<?php

/**
 * instructor_enroll module helper.
 *
 * @package    tutorplus.org
 * @subpackage instructor_enroll
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class instructor_enrollGeneratorHelper extends BaseInstructor_enrollGeneratorHelper {

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/\'"/>';
    }

}