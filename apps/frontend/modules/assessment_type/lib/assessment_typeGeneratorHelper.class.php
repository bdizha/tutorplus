<?php

/**
 * assessment_type module helper.
 *
 * @package    tutorplus.org
 * @subpackage assessment_type
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assessment_typeGeneratorHelper extends BaseAssessment_typeGeneratorHelper
{
    public function linkToMyCourse($params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/course/' . sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null) . '\';return false"/>';
    }

    public function indexBreadcrumbs() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $course = CourseTable::getInstance()->findOneById($courseId);
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug(),
                "Assignment Groups" => "assignment_group"
            )
        );
    }

    public function indexLinks() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $course = CourseTable::getInstance()->findOneById($courseId);
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assessment_types",
            "slug" => $course->getSlug()
        );
    }

}