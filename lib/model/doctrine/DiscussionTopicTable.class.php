<?php

/**
 * DiscussionTopicTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DiscussionTopicTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object DiscussionTopicTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('DiscussionTopic');
    }

    public function getNbNewTopics($courseId = null) {
        $q = $this->createQuery('dt')
                ->innerJoin('dt.DiscussionGroup d');
        if ($courseId) {
            $q->innerJoin('d.CourseDiscussionGroup cd')
                    ->addWhere('cd.course_id = ?', $courseId);
        }

        $q->addWhere('dt.created_at > ?', date('Y-m-d H:i:s', strtotime("NOW - 7 days")));
        return $q->execute();
    }

    public function getTopicWithRecentActivity($courseId = null) {
        $q = $this->createQuery('dt')
                ->innerJoin('dt.DiscussionGroup d')
                ->leftJoin('dt.Messages dtm')
                ->leftJoin('dtm.Replies dtms');
        if ($courseId) {
            $q->innerJoin('d.CourseDiscussionGroup cd')
                    ->addWhere('cd.course_id = ?', $courseId);
        }
        $q->orderBy('dtms.id DESC')
                ->orderBy('dtm.id DESC')
                ->orderBy('dt.id DESC');

        return $q->fetchOne();
    }

    public function getTopicWithMostActivities($courseId = null) {
        $q = $this->createQuery('dt')
                ->innerJoin('dt.DiscussionGroup d')
                ->leftJoin('dt.Messages dtm')
                ->leftJoin('dtm.Replies dtms');
        if ($courseId) {
            $q->innerJoin('d.CourseDiscussionGroup cd')
                    ->addWhere('cd.course_id = ?', $courseId);
        }
        $q->orderBy('dtms.id DESC')
                ->orderBy('dtm.id DESC')
                ->orderBy('dt.id DESC');

        return $q->fetchOne();
    }

    public function findOrCreateOneByProfileId($profileId, $discussionGroupId) {
        $discussionTopic = self::getInstance()->findOneByProfileId($profileId);
        if (!is_object($discussionTopic)) {
            $discussionTopic = new DiscussionTopic();
            $discussionTopic->setSubject("Welcome to TutorPlus!");
            $discussionTopic->setMessage("Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!");
            $discussionTopic->setDiscussionGroupId($discussionGroupId);
            $discussionTopic->setIsPrimary(true);
            $discussionTopic->setProfileId($profileId);
            $discussionTopic->save();
        }
        return $discussionTopic;
    }

    public function findOneByProfileId($profileId) {
        $q = $this->createQuery('dt');
        $q->addWhere('dt.profile_id = ?', $profileId);
        $q->addWhere('dt.is_primary = ?', true);
        return $q->fetchOne();
    }

    public function findByProfileId($profileId) {
        $q = $this->createQuery('dt');
        $q->addWhere('dt.profile_id = ?', $profileId)
                ->orderBy('dt.updated_at DESC');
        return $q->execute();
    }

}