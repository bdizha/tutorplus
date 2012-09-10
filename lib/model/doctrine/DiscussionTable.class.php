<?php

/**
 * DiscussionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DiscussionTable extends Doctrine_Table
{
    const ACCESS_LEVELS_PUBLIC = 0;
    const ACCESS_LEVELS_RESTRICTED = 1;
    const MODULE_COURSE = "course";
    const MODULE_PROFILE = "profile";
    const MODULE_DISCUSSION = "discussion";
    static public $access_levels = array(
        0 => 'Public - Anyone can join, but only members can post messages.',
        1 => 'Restricted - Any prospect can only be invited by an active member.'
    );

    /**
     * Returns an instance of this class.
     *
     * @return object DiscussionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Discussion');
    }

    public function getAccessLevels()
    {
        return self::$access_levels;
    }

    public function findOrCreateOneByCourse($course, $userId)
    {
        if (!is_object($courseDiscussion = CourseDiscussionTable::getInstance()->findOneByCourseId($course->getId())))
        {
            // save a discussion
            $discussion = new Discussion();
            $discussion->setName($course->getCode() . " - main discussion");
            $discussion->setDescription("This a discussion goup for the " . $course->getCode() . " course. Essentially, all the instructors and students of this course are encouraged to participate and collaborate with other participants in order for each one involved to full benefit from the rest of the participants.");
            $discussion->setUserId($userId);
            $discussion->setAccessLevel(DiscussionTable::ACCESS_LEVELS_RESTRICTED);
            $discussion->save();

            // save a course discussion
            $courseDiscussion = new CourseDiscussion();
            $courseDiscussion->setCourse($course);
            $courseDiscussion->setDiscussion($discussion);
            $courseDiscussion->save();

            // save all course students to this discussion
            $this->setStudentMembersByCourse($course, $discussion);

            // save all course instructors to this discussion
            $this->setInstructorMembersByCourse($course, $discussion);
        }
        return $courseDiscussion->getDiscussion();
    }

    public function setStudentMembersByCourse($course, $discussion)
    {
        foreach ($course->getCourseStudents() as $courseStudent)
        {
            if (!is_object($discussionMember = DiscussionMemberTable::getInstance()->findOneByDiscussionIdAndUserId($discussion->getId(), $courseStudent->getStudent()->getUserId())))
            {
                $discussionMember = new DiscussionMember();
                $discussionMember->setDiscussionId($discussion);
                $discussionMember->setUserId($courseStudent->getStudent()->getUserId());
                $discussionMember->setNickname($courseStudent->getStudent()->getFirstName());
                $discussionMember->setStatus(DiscussionMemberTable::POSTING_PERMISSION_TYPE_DEFAULT);
                $discussionMember->setSubscriptionType(DiscussionMemberTable::SUBSCRIPTION_TYPE_PROMPT_EMAIL);
                $discussionMember->setPostingPermissionType(DiscussionMemberTable::POSTING_PERMISSION_TYPE_DEFAULT);
                $discussionMember->setMembershipType(DiscussionMemberTable::MEMBERSHIP_TYPE_ORDINARY);
                $discussionMember->save();
            }
        }
    }

    public function setInstructorMembersByCourse($course, $discussion)
    {
        foreach ($course->getCourseInstructors() as $courseInstructor)
        {
            if (!is_object($discussionMember = DiscussionMemberTable::getInstance()->findOneByDiscussionIdAndUserId($discussion->getId(), $courseInstructor->getInstructor()->getUserId())))
            {
                $discussionMember = new DiscussionMember();
                $discussionMember->setDiscussionId($discussion);
                $discussionMember->setUserId($courseInstructor->getInstructor()->getUserId());
                $discussionMember->setNickname($courseInstructor->getInstructor()->getFirstName());
                $discussionMember->setStatus(DiscussionMemberTable::POSTING_PERMISSION_TYPE_DEFAULT);
                $discussionMember->setSubscriptionType(DiscussionMemberTable::SUBSCRIPTION_TYPE_PROMPT_EMAIL);
                $discussionMember->setPostingPermissionType(DiscussionMemberTable::POSTING_PERMISSION_TYPE_OWNER);
                $discussionMember->setMembershipType(DiscussionMemberTable::MEMBERSHIP_TYPE_OWNER);
                $discussionMember->save();
            }
        }
    }   
    

    public function findOneByDiscussionIdAndUserId($discussionId, $userId)
    {
        $query = $this->createQuery('d')
            ->addWhere('d.id = ?', $discussionId)
            ->andWhere('d.user_id = ?', $userId);
        return $query->fetchOne();
    }

}