<?php

/**
 * activity_feed module helper.
 *
 * @package    tutorplus
 * @subpackage activity_feed
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_feedGeneratorHelper extends BaseActivity_feedGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "Activity Feeds" => "activity_feed"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "activity_feeds"
        );
    }

}