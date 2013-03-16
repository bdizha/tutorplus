<?php

switch ($activityFeed->getType()) {
    case ActivityFeedTable::TYPE_DISCUSSION_CREATED:
        include_partial('tpActivityFeed/discussion_created', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_PEER_SUBSCRIBED:
        include_partial('tpActivityFeed/discussion_subscribed', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_PEER_UNSUBSCRIBED:
        include_partial('tpActivityFeed/discussion_unsubscribed', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_TOPIC_SUBMITTED:
        include_partial('tpActivityFeed/topic_started', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_POST_SUBMITTED:
        include_partial('tpActivityFeed/post_submitted', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_COMMENT_SUBMITTED:
        include_partial('tpActivityFeed/comment_submitted', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_EMAIL_RECEIVED:
        include_partial('tpActivityFeed/email_received', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_EMAIL_SENT:
        include_partial('tpActivityFeed/email_sent', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_EVENT_INVITED:
        include_partial('tpActivityFeed/event_invited', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_EVENT_DECLINED:
        include_partial('tpActivityFeed/event_declined', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_PEER_INVITED:
        include_partial('tpActivityFeed/peer_invited', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_PEER_ACCEPTED:
        include_partial('tpActivityFeed/peer_accepted', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_PROFILE_ENROLLED:
        include_partial('tpActivityFeed/profile_enrolled', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_COURSE_ENROLLED:
        include_partial('tpActivityFeed/course_enrolled', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_COURSE_UNREGISTERED:
        include_partial('tpActivityFeed/course_unregistered', array('activityFeed' => $activityFeed));
        break;
    default:
}
?>