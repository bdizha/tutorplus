<?php

require_once dirname(__FILE__) . '/../lib/course_linkGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/course_linkGeneratorHelper.class.php';

/**
 * course_link actions.
 *
 * @package    tutorplus
 * @subpackage course_link
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_linkActions extends autoCourse_linkActions
{

    public function executeLinks(sfWebRequest $request)
    {
        if ($course_id = $this->getUser()->getMyAttribute('course_show_id', null))
        {
            $this->course_links = CourseLinkTable::getInstance()->findByCourse($course_id);
        }
        else
        {
            die("A null course id has been encountered...");
        }
    }

}
