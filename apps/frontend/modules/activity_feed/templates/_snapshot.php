<?php

switch ($activityFeed->getActivityTemplate()->getType()) {
  case ActivityTemplateTable::TYPE_POSTED_DISCUSSION:
    include_partial('activity_feed/discussion', array('activityFeed' => $activityFeed));
    break;
  case ActivityTemplateTable::TYPE_POSTED_DISCUSSION_TOPIC:
    include_partial('activity_feed/topic', array('activityFeed' => $activityFeed));
    break;
  case ActivityTemplateTable::TYPE_POSTED_DISCUSSION_MESSAGE:
    include_partial('activity_feed/post', array('activityFeed' => $activityFeed));
    break;
  default:
}
?>