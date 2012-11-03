<?php

/**
 * Course
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Course extends BaseCourse {

    public function getAnnouncements() {
        return Doctrine_Core::getTable('Announcement')->findByCourseId($this->getId());
    }

    public function save(Doctrine_Connection $conn = null) {
        parent::save($conn);

        if (!$this->isNew()) {
            $gradebook = new Gradebook();
            $gradebook->setCourseId($this->get("id"));
            $gradebook->setItems(0);
            $gradebook->save();

            $gradebook_scale = new GradebookScale();
            $gradebook_scale->setGradebookId($gradebook->get("id"));
            $gradebook_scale->setMinPoints(75);
            $gradebook_scale->setMaxPoints(100);
            $gradebook_scale->setCode("A");
            $gradebook_scale->save();

            $gradebook_scale = new GradebookScale();
            $gradebook_scale->setGradebookId($gradebook->get("id"));
            $gradebook_scale->setMinPoints(65);
            $gradebook_scale->setMaxPoints(74);
            $gradebook_scale->setCode("B");
            $gradebook_scale->save();

            $gradebook_scale = new GradebookScale();
            $gradebook_scale->setGradebookId($gradebook->get("id"));
            $gradebook_scale->setMinPoints(55);
            $gradebook_scale->setMaxPoints(64);
            $gradebook_scale->setCode("C");
            $gradebook_scale->save();

            $gradebook_scale = new GradebookScale();
            $gradebook_scale->setGradebookId($gradebook->get("id"));
            $gradebook_scale->setMinPoints(45);
            $gradebook_scale->setMaxPoints(54);
            $gradebook_scale->setCode("D");
            $gradebook_scale->save();

            $gradebook_scale = new GradebookScale();
            $gradebook_scale->setGradebookId($gradebook->get("id"));
            $gradebook_scale->setMinPoints(35);
            $gradebook_scale->setMaxPoints(44);
            $gradebook_scale->setCode("E");
            $gradebook_scale->save();

            $gradebook_scale = new GradebookScale();
            $gradebook_scale->setGradebookId($gradebook->get("id"));
            $gradebook_scale->setMinPoints(0);
            $gradebook_scale->setMaxPoints(34);
            $gradebook_scale->setCode("F");
            $gradebook_scale->save();
        }
    }

    public function retrieveUpcomingAssignments() {
        $q = Doctrine_Query::create()
                ->from('Assignment a')
                ->addWhere("a.course_id = ?", $this->get("id"))
                ->addWhere('a.due_date > ?', date('d-m-y H:i:s', strtotime("NOW")))
                ->limit(1);

        return AssignmentTable::getInstance()->retrieveUpcomingAssignments($q);
    }

    public function getDiscussion() {
        $courseDiscussion = CourseDiscussionTable::getInstance()->findOneByCourseId($this->getId());
        if (is_object($courseDiscussion)) {
            return $courseDiscussion->getDiscussion();
        }
        return null;
    }

    public function getHtmlizedDescription() {
        return myToolkit::htmlString(parent::get("description"));
    }

}
