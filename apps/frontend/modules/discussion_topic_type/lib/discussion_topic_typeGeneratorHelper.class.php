<?php

/**
 * discussion_topic_type module helper.
 *
 * @package    tutorplus.org
 * @subpackage discussion_topic_type
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topic_typeGeneratorHelper extends BaseDiscussion_topic_typeGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Communication Settings" => "communication_settings",
                "Discussion Types" => "discussion_types"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "discussion_types",
        );
    }

}