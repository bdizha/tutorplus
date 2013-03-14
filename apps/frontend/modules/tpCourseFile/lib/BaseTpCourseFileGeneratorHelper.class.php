<?php

/**
 * tpCourseFile module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage course
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTpCourseFileGeneratorHelper extends sfModelGeneratorHelper {

    public function getUrlForAction($action) {
        return 'list' == $action ? 'course' : 'course_' . $action;
    }

}
