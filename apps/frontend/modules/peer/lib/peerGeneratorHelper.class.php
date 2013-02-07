<?php

/**
 * peer module helper.
 *
 * @package    tutorplus
 * @subpackage peer
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class peerGeneratorHelper extends BasePeerGeneratorHelper {

    public function studentsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Peers" => "peer",
                "Student Peers" => "peer"
            )
        );
    }

    public function instructorsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Peers" => "peer",
                "Instructor Peers" => "peer"
            )
        );
    }

    public function findBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Peers" => "peer",
                "Find Peers" => "peer"
            )
        );
    }

    public function suggestedBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Peers" => "peer",
                "Suggested Peers" => "peer"
            )
        );
    }

    public function allLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $profileId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "currentParent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_peers",
            "slug" => $sfUser->getProfile()->getSlug(),
            "ignore" => !$sfUser->isCurrent($profileId)
        );
    }

    public function findPeers() {
        return array(
            "actions" => array(
                "find_peers" => array("title" => "+ Find Peers", "url" => "peer/find")
            )
        );
    }

    public function getAllTabs($activeTab, $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers) {
        $tabs = array(
            "students" => array(
                "label" => "Students",
                "href" => "/peer/students",
                "count" => $studentPeers->count()
            ),
            "instructors" => array(
                "label" => "Instructors",
                "href" => "/peer/instructors",
                "count" => $instructorPeers->count()
            ),
            "suggested" => array(
                "label" => "Suggested",
                "href" => "/peer/suggested",
                "count" => $suggestedPeers->count()
            ),
            "requests" => array(
                "label" => "Requests",
                "href" => "/peer/requests",
                "count" => $requestingPeers->count()
            ),
            "find" => array(
                "label" => "Find",
                "href" => "/peer/find"
            )
        );

        if (isset($tabs[$activeTab])) {
            $tabs[$activeTab]["is_active"] = true;
        }

        return $tabs;
    }

}