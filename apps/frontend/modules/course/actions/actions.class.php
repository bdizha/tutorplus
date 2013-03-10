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

    public function preExecute()
    {
        parent::preExecute();
        $this->helper->setProfile($this->getUser()->getProfile());
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->course = $this->getRoute()->getObject();
        $this->profile = $this->getUser()->getProfile();
        $this->forward404Unless($this->course);
        $this->helper->setCourse($this->course);
        $this->courseInstructorProfiles = ProfileTable::getInstance()->findByCourseId($this->course->getId(), true);
        $this->getUser()->setMyAttribute('course_show_id', $this->course->getId());
        $this->courseDiscussions = DiscussionTable::getInstance()->findByCourseId($this->course->getId());
    }

    public function executeExplorer(sfWebRequest $request)
    {
        $this->exploreCourses = CourseTable::getInstance()->findAll();
        $this->myCourses = $this->getUser()->getProfile()->getCourses();
    }

    public function executeMy(sfWebRequest $request)
    {
        $this->exploreCourses = CourseTable::getInstance()->findAll();
        $this->myCourses = $this->getUser()->getProfile()->getCourses();
    }

    public function executeInfo(sfWebRequest $request)
    {
        $this->redirectIf($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course_show?id=" . $courseId);
    }

    public function executeFiles(sfWebRequest $request)
    {
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course_files = FileTable::getInstance()->findByCourse($courseId);
    }

    public function executeVideos(sfWebRequest $request)
    {
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course = CourseTable::getInstance()->find(array($courseId));
        $this->helper->setCourse($this->course);
    }

    public function executeSyllabus(sfWebRequest $request)
    {
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course = CourseTable::getInstance()->find(array($courseId));
    }

    protected function saveOrGetProfileCourses($postedCourseIds = null, $module, $objectId)
    {
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

    public function executeCalendar(sfWebRequest $request)
    {
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course = CourseTable::getInstance()->find(array($courseId));

        $ids = array();
        $calendarIds = CalendarTable::getInstance()->retrieveByIdsProfileIdAndVisibility($this->getUser()->getId());

        foreach ($calendarIds as $key => $calendarId) {
            $ids[] = $calendarId["id"];
        }

        $this->getUser()->setMyAttribute('calendar_ids', array_values($ids));
    }

    public function executeEnroll(sfWebRequest $request)
    {
        $response = array();
        $response["status"] = '';
        $response["notice"] = '';
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

                $response["status"] = 'success';
                $response["notice"] = "Congrats! You've successfully enrolled into the \"{$course->getName()} ~ ({$course->getCode()})\" course!";
            } else {
                $response["status"] = 'failure';
                $response["notice"] = "It seems you're already enrolled into the \"{$course->getName()} ~ ({$course->getCode()})\" course!";
            }
        } catch (Exception $e) {
            $response["notice"] = 'Oops, an error has occurred and been sent to our support team.';
        }
        die(json_encode($response));
    }

    public function executeUnregister(sfWebRequest $request)
    {
        $response = array();
        $response["status"] = '';
        $response["notice"] = '';
        try {
            $courseId = $request->getParameter("course_id");
            $course = CourseTable::getInstance()->find($courseId);
            $profile = $this->getUser()->getProfile();

            if ($profile->isEnrolled($courseId)) {
                ProfileCourseTable::getInstance()->deleteByCourseIdAndProfileId($courseId, $profile->getId());

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

                $response["notice"] = "You've successfully unregistered from the \"{$course->getName()} ~ ({$course->getCode()})\" course!";
                $response["status"] = 'success';
            } else {
                $response["notice"] = "You've already unregistered from the \"{$course->getName()} ~ ({$course->getCode()})\" course!";
                $response["status"] = 'failure';
            }
        } catch (Exception $e) {
            $response["status"] = 'failure';
            $response["notice"] = "You course not be unregistered from course! Please try gain or contact us.";
        }
        die(json_encode($response));
    }

}