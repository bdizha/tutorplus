<?php

/**
 * MailingList
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MailingList extends BaseMailingList
{

    public function getCourses()
    {
        $courses = array();
        $mailingListCourses = $this->getMailingListCourses();
        foreach ($mailingListCourses as $mailingListCourse)
        {
            $courses[$mailingListCourse->getCourse()->getId()] = $mailingListCourse->getCourse()->toArray();
        }

        return $courses;
    }
}
