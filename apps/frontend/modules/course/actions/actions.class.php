<?php

require_once dirname(__FILE__) . '/../lib/courseGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/courseGeneratorHelper.class.php';

/**
 * course actions.
 *
 * @package    tutorplus
 * @subpackage course
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class courseActions extends autoCourseActions {

    public function executeShow(sfWebRequest $request) {
        $this->course = $this->getRoute()->getObject();
        $this->forward404Unless($this->course);
        $this->courseInstructorProfiles = ProfileTable::getInstance()->findByCourseId($this->course->getId(), true);
        $this->getUser()->setMyAttribute('course_show_id', $this->course->getId());
    }

    public function executeExplorer(sfWebRequest $request) {
        $this->courses = CourseTable::getInstance()->findAll();
    }

    public function executeMy(sfWebRequest $request) {
        $this->courses = $this->getUser()->getProfile()->getCourses();
    }

    public function executeInfo(sfWebRequest $request) {
        $this->redirectIf($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course_show?id=" . $courseId);
    }

    public function executeFiles(sfWebRequest $request) {
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course_files = FileTable::getInstance()->findByCourse($courseId);
    }

    public function executeChoose(sfWebRequest $request) {
        $this->module = $request->getParameter("module_name");
        $this->objectId = $request->getParameter("object_id");

        // fetch all courses for now
        $this->courses = CourseTable::getInstance()->findAll();
        $this->currentCourseIds = array();

        if ($request->getMethod() == "POST") {
            $notice = 'The course(s) were added successfully.';
            try {
                $courses = $request->getParameter('courses');

                // save courses
                $this->currentCourseIds = $this->saveOrGetProfileCourses($courses, $this->module, $this->objectId);

                // send new courses subscription
            } catch (Doctrine_Validator_Exception $e) {
                $this->getUser()->setFlash('error', 'The course(s) have not been added due to some errors.', false);
            }

            $this->getUser()->setFlash('notice', $notice, false);
        } else {
            // fetch the current course
            $this->currentCourseIds = $this->saveOrGetProfileCourses(null, $this->module, $this->objectId);
        }
    }

    protected function saveOrGetProfileCourses($postedCourseIds = null, $module, $objectId) {
        if ($module == CourseTable::MODULE_STUDENT) {
            // fetch current courses by profile id
            $currentCourseIds = array_keys(ProfileTable::getInstance()->find($objectId)->getCourses());

            if (!$postedCourseIds) {
                return $currentCourseIds;
            }

            $toDelete = array_diff($currentCourseIds, $postedCourseIds);
            if (count($toDelete)) {
                ProfileCourseTable::getInstance()->deleteByCoursesIdsAndProfileId($toDelete, $objectId);
            }

            $toAdd = array_diff($postedCourseIds, $currentCourseIds);
            if (count($toAdd)) {
                foreach ($toAdd as $courseId) {
                    $profileCourse = new ProfileCourse();
                    $profileCourse->setProfileId($objectId);
                    $profileCourse->setCourseId($courseId);
                    $profileCourse->save();
                }
            }
        } elseif ($module == CourseTable::MODULE_INSTRUCTOR) {
            // fetch current courses by instructor id
            $currentCourseIds = array_keys(InstructorTable::getInstance()->find($objectId)->getCourses());

            if (!$postedCourseIds) {
                return $currentCourseIds;
            }

            $toDelete = array_diff($currentCourseIds, $postedCourseIds);
            if (count($toDelete)) {
                InstructorCourseTable::getInstance()->deleteByCoursesIdsAndInstructorId($toDelete, $objectId);
            }

            $toAdd = array_diff($postedCourseIds, $currentCourseIds);
            if (count($toAdd)) {
                foreach ($toAdd as $courseId) {
                    $instructorCourse = new InstructorCourse();
                    $instructorCourse->setInstructorId($objectId);
                    $instructorCourse->setCourseId($courseId);
                    $instructorCourse->save();
                }
            }
        } elseif ($module == CourseTable::MODULE_STAFF) {
            // fetch current courses by staff id
            $currentCourseIds = array_keys(StaffTable::getInstance()->find($objectId)->getCourses());

            if (!$postedCourseIds) {
                return $currentCourseIds;
            }

            $toDelete = array_diff($currentCourseIds, $postedCourseIds);
            if (count($toDelete)) {
                StaffCourseTable::getInstance()->deleteByCoursesIdsAndStaffId($toDelete, $objectId);
            }

            $toAdd = array_diff($postedCourseIds, $currentCourseIds);
            if (count($toAdd)) {
                foreach ($toAdd as $courseId) {
                    $staffCourse = new StaffCourse();
                    $staffCourse->setStaffId($objectId);
                    $staffCourse->setCourseId($courseId);
                    $staffCourse->save();
                }
            }
        } elseif ($module == CourseTable::MODULE_MAILING_LIST) {
            // fetch current courses by mailing list id
            $currentCourseIds = array_keys(MailingListTable::getInstance()->find($objectId)->getCourses());

            if (!$postedCourseIds) {
                return $currentCourseIds;
            }

            $toDelete = array_diff($currentCourseIds, $postedCourseIds);
            if (count($toDelete)) {
                MailingListCourseTable::getInstance()->deleteByCoursesIdsAndMailingListId($toDelete, $objectId);
            }

            $toAdd = array_diff($postedCourseIds, $currentCourseIds);
            if (count($toAdd)) {
                foreach ($toAdd as $courseId) {
                    $mailingListCourse = new MailingListCourse();
                    $mailingListCourse->setMailingListId($objectId);
                    $mailingListCourse->setCourseId($courseId);
                    $mailingListCourse->save();
                }
            }
        }

        return $postedCourseIds;
    }

    public function executeCalendar(sfWebRequest $request) {
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course = CourseTable::getInstance()->find(array($courseId));

        $ids = array();
        $calendarIds = CalendarTable::getInstance()->retrieveByIdsProfileIdAndVisibility($this->getUser()->getId());

        foreach ($calendarIds as $key => $calendarId) {
            $ids[] = $calendarId["id"];
        }

        $this->getUser()->setMyAttribute('calendar_ids', array_values($ids));
    }

    public function executeEnroll(sfWebRequest $request) {
        try {
            $courseId = $request->getParameter("course_id");
            $course = CourseTable::getInstance()->find($courseId);
            $profile = $this->getUser()->getProfile();

            if (!$profile->isEnrolled($courseId)) {
                $profileCourse = new ProfileCourse();
                $profileCourse->setProfileId($profile->getId());
                $profileCourse->setCourseId($courseId);
                $profileCourse->save();

                // save this activity
                $activityFeed = new ActivityFeed();
                $activityFeed->setProfileId($profile->getId());
                $activityFeed->setItemId($courseId);
                $activityFeed->setType(ActivityFeedTable::TYPE_COURSE_ENROLLED);
                $activityFeed->save();

                // link this activity with the current profile
                $profileActivityFeed = new ProfileActivityFeed();
                $profileActivityFeed->setProfileId($profile->getId());
                $profileActivityFeed->setActivityFeedId($activityFeed->getId());
                $profileActivityFeed->save();

                echo "success";
                $this->getUser()->setFlash("notice", "Congrats! You've successfully enrolled into the \"{$course->getName()} ~ ({$course->getCode()})\" course!");
            } else {
                echo "error";
                $this->getUser()->setFlash("notice", "It seems you're already enrolled into the \"{$course->getName()} ~ ({$course->getCode()})\" course!");
            }
        } catch (Exception $e) {
            echo "error";
            $this->getUser()->setFlash("notice", "You could not be enrolled into this course! Please try gain or contact us.");
        }
    }

    public function executeUnregistered(sfWebRequest $request) {
        try {
            $courseId = $request->getParameter("course_id");
            $course = CourseTable::getInstance()->find($courseId);
            $profile = $this->getUser()->getProfile();

            if ($profile->isEnrolled($courseId)) {
                
                $course = ProfileCourseTable::getInstance()->unRegisterProfileId($profile->getId());

                // save this activity
                $activityFeed = new ActivityFeed();
                $activityFeed->setProfileId($profile->getId());
                $activityFeed->setItemId($courseId);
                $activityFeed->setType(ActivityFeedTable::TYPE_COURSE_UNREGISTERED);
                $activityFeed->save();

                // link this activity with the current profile
                $profileActivityFeed = new ProfileActivityFeed();
                $profileActivityFeed->setProfileId($profile->getId());
                $profileActivityFeed->setActivityFeedId($activityFeed->getId());
                $profileActivityFeed->save();

                echo "success";
                $this->getUser()->setFlash("notice", "You've successfully unregistered from the \"{$course->getName()} ~ ({$course->getCode()})\" course!");
            } else {
                echo "error";
                $this->getUser()->setFlash("notice", "You've already unregistered from the \"{$course->getName()} ~ ({$course->getCode()})\" course!");
            }
        } catch (Exception $e) {
            echo "error";
            $this->getUser()->setFlash("notice", "You course not be unregistered from course! Please try gain or contact us.");
        }
    }

}