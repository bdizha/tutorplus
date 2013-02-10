<?php

switch ($activityFeed->getType()) {
    case ActivityFeedTable::TYPE_DISCUSSION_GROUP_CREATED:
        include_partial('activity_feed/group_created', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_PEER_SUBSCRIBED:
        include_partial('activity_feed/group_subscribed', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_PEER_UNSUBSCRIBED:
        include_partial('activity_feed/group_unsubscribed', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_TOPIC_SUBMITTED:
        include_partial('activity_feed/topic_started', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_POST_SUBMITTED:
        include_partial('activity_feed/post_submitted', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_DISCUSSION_COMMENT_SUBMITTED:
        include_partial('activity_feed/comment_submitted', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_EMAIL_RECEIVED:
        include_partial('activity_feed/email_received', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_EMAIL_SENT:
        include_partial('activity_feed/email_sent', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_EVENT_INVITED:
        include_partial('activity_feed/event_invited', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_EVENT_DECLINED:
        include_partial('activity_feed/event_declined', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_PEER_INVITED:
        include_partial('activity_feed/peer_invited', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_PEER_ACCEPTED:
        include_partial('activity_feed/peer_accepted', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_PROFILE_ENROLLED:
        include_partial('activity_feed/profile_enrolled', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_COURSE_ENROLLED:
        include_partial('activity_feed/course_enrolled', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_COURSE_UNREGISTERED:
        include_partial('activity_feed/course_unregistered', array('activityFeed' => $activityFeed));
        break;
    default:
}
?>