<?php

require_once dirname(__FILE__) . '/../lib/course_reading_itemGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/course_reading_itemGeneratorHelper.class.php';

/**
 * course_reading_item actions.
 *
 * @package    ecollegeplus
 * @subpackage course_reading_item
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_reading_itemActions extends autoCourse_reading_itemActions
{

    public function executeReadingItems(sfWebRequest $request)
    {
        if ($course_id = $this->getUser()->getMyAttribute('course_show_id', null))
        {
            $this->course_reading_items = CourseReadingItemTable::getInstance()->findByCourse($course_id);
        }
        else
        {
            die("A null course id has been encountered...");
        }
    }

}
