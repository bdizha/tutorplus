<?php

/**
 * course_peer module helper.
 *
 * @package    tutorplus
 * @subpackage course_link
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_peerGeneratorHelper {

    public function indexBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug()
            )
        );
    }

    public function indexLinks($course) {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_peers",
            "slug" => $course->getSlug()
        );
    }
}