<?php

require_once dirname(__FILE__) . '/../lib/tpCourseLinkGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpCourseLinkGeneratorHelper.class.php';

/**
 * tpCourseLink actions.
 *
 * @package    tutorplus
 * @subpackage tpCourseLink
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseLinkActions extends autoTpCourseLinkActions
{

    public function executeLinks(sfWebRequest $request)
    {
        if ($course_id = $this->getUser()->getMyAttribute('course_show_id', null))
        {
            $this->tpCourseLinks = CourseLinkTable::getInstance()->findByCourse($course_id);
        }
        else
        {
            die("A null course id has been encountered...");
        }
    }

}
