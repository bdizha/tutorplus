<?php

require_once dirname(__FILE__) . '/../lib/profileGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profileGeneratorHelper.class.php';

/**
 * profile actions.
 *
 * @package    tutorplus
 * @subpackage profile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends autoProfileActions {

    /**
     * Executes show action
     *
     * @param sfRequest $request A request object
     */
    public function executeShow(sfWebRequest $request) {
        $slug = $request->getParameter("slug");
        $this->profile = ProfileTable::getInstance()->findOneBy("slug", $slug);
        $this->getUser()->setMyAttribute('profile_show_id', $this->profile->getId());

        // suggest this profile some peers
        $this->profile->suggestPeers();

        $primaryDiscussionGroup = DiscussionGroupTable::getInstance()->findOrCreatePrimaryDiscussionGroupByProfile($this->profile);
        $this->primaryDiscussionTopic = DiscussionTopicTable::getInstance()->findOrCreateOneByProfileId($this->profile->getId(), $primaryDiscussionGroup->getId());

        $this->activityFeeds = ActivityFeedTable::getInstance()->findByProfileId($this->profile->getId());
        $this->discussionCommentForm = new DiscussionCommentForm();
        $this->discussionPostForm = new DiscussionPostForm();
        $this->discussionPostForm->setDefaults(array(
            "profile_id" => $this->getUser()->getId(),
            "discussion_topic_id" => $this->primaryDiscussionTopic->getId()
        ));
    }

    /**
     * Executes peers action
     *
     * @param sfRequest $request A request object
     */
    public function executePeers(sfWebRequest $request) {
        $profileId = $this->getUser()->getMyAttribute('profile_show_id', null);
        $this->studentPeers = PeerTable::getInstance()->findByProfileIdAndIsInstructor($profileId, false);
        $this->instructorPeers = PeerTable::getInstance()->findByProfileIdAndIsInstructor($profileId, true);
        $this->potentialPeers = PeerTable::getInstance()->findByNotProfileId($profileId);
    }

    public function executeShowPhoto(sfWebRequest $request) {
        $photo_exentions = array("png", "gif", "jpg");
        $avatarFormat = sfConfig::get("sf_web_dir") . "/avatars/%s.png";

        if ($request->hasParameter("profile_id") && $request->hasParameter("size")) {
            $photo_name = sprintf(sfConfig::get("sf_web_dir") . "/uploads/users/" . $request->getParameter("profile_id") . "/normal-%s.", $request->getParameter("size"));
            $filename = "";

            foreach ($photo_exentions as $ext) {
                if (is_file($photo_name . $ext)) {
                    $filename = $photo_name . $ext;
                    break;
                }
            }

            $filename = empty($filename) ? sprintf($avatarFormat, $request->getParameter("size")) : $filename;
        }

        if (empty($filename) || !is_file($filename)) {
            // display the smallest avatar to be safe
            $filename = sprintf($avatarFormat, "24");
        }

        $fileInfo = getimagesize($filename);

        $fp = fopen($filename, 'rb');
        header("Content-Type: " . $fileInfo["mime"]);
        header("Content-Length: " . filesize($filename));
        fpassthru($fp);
        exit;
    }

    public function executeDeletePhoto(sfWebRequest $request) {
        // this should delete all the files the user uploaded alongside all their thumbnails
        // replace the user files with the available avatars
        $filesystem = new sfFilesystem();
        $filesystem->remove(sfFinder::type('file')->in(sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId()));

        $this->getUser()->setFlash('notice', 'Your profile photo has been deleted successfully.');
        $this->redirect("personal_info");
    }

}
