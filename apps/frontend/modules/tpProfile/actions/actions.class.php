<?php

require_once dirname(__FILE__) . '/../lib/tpProfileGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProfileGeneratorHelper.class.php';
/**
 * tpProfile actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProfile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileActions extends autoTpProfileActions
{

    public function executeCheckLogIn()
    {
        die(json_encode(array("status" => $this->getUser()->isAuthenticated() ? "200" : "401")));
    }

    public function beforeExecute()
    {
        $this->profileId = $this->getUser()->getMyAttribute('profile_show_id', null);
        $this->profile = ProfileTable::getInstance()->findOneById($this->profileId);
        $this->activityFeeds = ActivityFeedTable::getInstance()->findByProfileId($this->profileId, 20);
        $this->groupActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profileId, ActivityFeedTable::TYPE_DISCUSSION_CREATED, 20);
        $this->topicActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profileId, ActivityFeedTable::TYPE_DISCUSSION_TOPIC_SUBMITTED, 20);
        $this->postActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profileId, ActivityFeedTable::TYPE_DISCUSSION_POST_SUBMITTED, 20);
        $this->peers = PeerTable::getInstance()->findByProfileId($this->profileId);
    }

    /**
     * Executes show action
     *
     * @param sfRequest $request A request object
     */
    public function executeShow(sfWebRequest $request)
    {
        $slug = $request->getParameter("slug");
        $this->profile = ProfileTable::getInstance()->findOneBy("slug", $slug);
        $this->forward404Unless($this->profile);
        $this->getUser()->setMyAttribute('profile_show_id', $this->profile->getId());

        // suggest this profile some peers
        $this->profile->suggestPeers();
        $this->beforeExecute();

        $primaryDiscussion = DiscussionTable::getInstance()->findOrCreatePrimaryDiscussionByProfile($this->profile);
        $this->primaryDiscussionTopic = DiscussionTopicTable::getInstance()->findOrCreateOneByProfileId($this->profile->getId(), $primaryDiscussion->getId());
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
    public function executePeers(sfWebRequest $request)
    {
        $this->beforeExecute();
    }

    /**
     * Executes discussions action
     *
     * @param sfRequest $request A request object
     */
    public function executeDiscussions(sfWebRequest $request)
    {
        $this->beforeExecute();
    }

    /**
     * Executes topics action
     *
     * @param sfRequest $request A request object
     */
    public function executeTopics(sfWebRequest $request)
    {
        $this->beforeExecute();
    }

    /**
     * Executes posts action
     *
     * @param sfRequest $request A request object
     */
    public function executeActivityFeeds(sfWebRequest $request)
    {
        $this->beforeExecute();
    }

    public function executeShowPhoto(sfWebRequest $request)
    {
        $photoExtentions = array("png", "gif", "jpg");
        $avatarFormat = sfConfig::get("sf_web_dir") . "/avatars/male_%s.png";

        if ($request->hasParameter("profile_id") && $request->hasParameter("size")) {
            $profileId = $request->getParameter("profile_id");
            $profile = ProfileTable::getInstance()->findOneById($profileId);
            $gender = strtolower($profile->getGender() ? $profile->getGender() : "male");

            $avatarFormat = sfConfig::get("sf_web_dir") . "/avatars/%s_%s.png";
            $photoName = sprintf(sfConfig::get("sf_web_dir") . "/uploads/users/" . $profileId . "/normal-%s.", $request->getParameter("size"));
            $filename = "";

            foreach ($photoExtentions as $ext) {
                if (is_file($photoName . $ext)) {
                    $filename = $photoName . $ext;
                    break;
                }
            }

            $filename = empty($filename) ? sprintf($avatarFormat, $gender, $request->getParameter("size")) : $filename;
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

    public function executeDeletePhoto(sfWebRequest $request)
    {
        // this should delete all the files the user uploaded alongside all their thumbnails
        // replace the user files with the available avatars
        $filesystem = new sfFilesystem();
        $filesystem->remove(sfFinder::type('file')->in(sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId()));

        $this->getUser()->setFlash('notice', 'Your profile photo has been deleted successfully.');
        $this->redirect("personal_info");
    }

}
