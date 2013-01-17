<?php

switch ($activityFeed->getType()) {
    case ActivityFeedTable::TYPE_POSTED_DISCUSSION:
        include_partial('activity_feed/discussion', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_POSTED_DISCUSSION_TOPIC:
        include_partial('activity_feed/topic', array('activityFeed' => $activityFeed));
        break;
    case ActivityFeedTable::TYPE_POSTED_DISCUSSION_POST:
        include_partial('activity_feed/post', array('activityFeed' => $activityFeed));
        break;
    default:
}
?>