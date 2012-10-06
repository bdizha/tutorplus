<?php

require_once dirname(__FILE__) . '/../lib/profileGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profileGeneratorHelper.class.php';

/**
 * profile actions.
 *
 * @package    ecollegeplus
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
        $this->user = sfGuardUserTable::getInstance()->findOneBy("slug", $slug);
        $this->getUser()->setMyAttribute('profile_show_id', $this->user->getId());
    }

    /**
     * Executes discussions action
     *
     * @param sfRequest $request A request object
     */
    public function executeDiscussions(sfWebRequest $request) {
        
    }

    /**
     * Executes peers action
     *
     * @param sfRequest $request A request object
     */
    public function executePeers(sfWebRequest $request) {
        $this->studentPeers = PeerTable::getInstance()->findByUserIdAndTypes($this->getUser()->getId(), array(PeerTable::TYPE_STUDENT_STUDENT, PeerTable::TYPE_INSTRUCTOR_STUDENT));
        $this->instructorPeers = PeerTable::getInstance()->findByUserIdAndTypes($this->getUser()->getId(), array(PeerTable::TYPE_STUDENT_INSTRUCTOR, PeerTable::TYPE_INSTRUCTOR_INSTRUCTOR));
    }

    /**
     * Executes settings action
     *
     * @param sfRequest $request A request object
     */
    public function executeAccountSettings(sfWebRequest $request) {
        
    }

    /**
     * Executes contact details action
     *
     * @param sfRequest $request A request object
     */
    public function executeContactDetails(sfWebRequest $request) {
        
    }

    /**
     * Executes peer action
     *
     * @param sfRequest $request A request object
     */
    public function executePeer(sfWebRequest $request) {
        $peerId = $request->getParameter("peer_id");
        $this->getUser()->setMyAttribute('peer_show_id', $peerId);

        // if the peer does exist then redirect to my profile page
        $this->redirect("@profile");
    }

    public function executeShowPhoto(sfWebRequest $request) {
        $photo_exentions = array("png", "gif", "jpg");
        $avatar_format = sfConfig::get("sf_web_dir") . "/avatars/%s.png";

        if ($request->hasParameter("user_id") && $request->hasParameter("size")) {
            $photo_name = sprintf(sfConfig::get("sf_web_dir") . "/uploads/users/" . $request->getParameter("user_id") . "/normal-%s.", $request->getParameter("size"));
            $filename = "";

            foreach ($photo_exentions as $ext) {
                if (is_file($photo_name . $ext)) {
                    $filename = $photo_name . $ext;
                    break;
                }
            }

            $filename = empty($filename) ? sprintf($avatar_format, $request->getParameter("size")) : $filename;
        }

        if (empty($filename) || !is_file($filename)) {
            // display the smallest avatar to be safe
            $filename = sprintf($avatar_format, "24");
        }

        $file_info = getimagesize($filename);

        $fp = fopen($filename, 'rb');
        header("Content-Type: " . $file_info["mime"]);
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

    public function executeEditAccountSettings(sfWebRequest $request) {
        $this->profile = $this->getUser()->getGuardUser();
        $this->form = new ProfileAccountSettingsForm($this->profile);
    }

    public function executeUpdateAccountSettings(sfWebRequest $request) {
        $this->profile = $this->getUser()->getGuardUser();
        $this->form = new ProfileAccountSettingsForm($this->profile);
        $this->processInlineForm($request, $this->form, "@profile_account_settings_edit?id=" . $this->profile->getId());

        $this->setTemplate('editAccountSettings');
    }

    protected function processInlineForm(sfWebRequest $request, sfForm $form, $route) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = 'Your credentials have been updated successfully.';
            try {
                $student = $form->save();
            } catch (Doctrine_Validator_Exception $e) {
                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $student)));

            $this->getUser()->setFlash('notice', $notice);
            $this->redirect($route);
        } else {
            $this->getUser()->setFlash('error', 'Your credentials have not been saved due to some errors.', false);
        }
    }

}
