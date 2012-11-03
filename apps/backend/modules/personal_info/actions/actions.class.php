<?php

/**
 * personal_info actions.
 *
 * @package    tutorplus
 * @subpackage personal_info
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class personal_infoActions extends sfActions {

    public function preExecute() {
        $photoExtension = "png";
        $resizedPhoto = sfFinder::type('any')->maxdepth(0)
                ->relative()
                ->name('normal-resized.*')
                ->in(sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId());

        if (isset($resizedPhoto[0])) {
            $photoParts = explode(".", $resizedPhoto[0]);

            if (count($photoParts) == 2) {
                $photoExtension = $photoParts[1];
            }
        }

        $this->profile = $this->getUser()->getProfile();
        $this->resized_photo = sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId() . "/normal-resized." . $photoExtension;
        $this->cropped_photo = sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId() . "/cropped." . $photoExtension;
        $this->resized_photo_dir = sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId();
        $this->resized_photo_src = "/uploads/users/" . $this->getUser()->getId() . "/resized." . $photoExtension;

        $this->forward404Unless($this->profile);
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        
    }

    /**
     * Executes student details action
     *
     * @param sfRequest $request A request object
     */
    public function executeStudentDetails(sfWebRequest $request) {
        
    }

    /**
     * Executes instructor details action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstructorDetails(sfWebRequest $request) {
        
    }

    public function executeProfilePhoto(sfWebRequest $request) {
        
    }

    public function executeUploadPhoto(sfWebRequest $request) {
        $this->form = new ProfilePhotoForm(null, array('user_id' => $this->getUser()->getId()));
        if ($request->getMethod() == "POST") {
            $this->processForm($request, $this->form);
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            try {
                if (!is_dir($this->resized_photo_dir)) {
                    mkdir($this->resized_photo_dir);
                }

                // make sure we get rid of all the existing files.
                $filesystem = new sfFilesystem();
                $filesystem->remove(sfFinder::type('file')->in(sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId()));

                $photo = $form->getValue("filename");
                $photo->save();
                $photo->resizePhoto();
            } catch (sfException $e) {
                throw $e;
            }
            $this->getUser()->setFlash('notice', 'Your photo has been uploaded successfully.', false);
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeCropPhoto(sfWebRequest $request) {
        if ($request->getMethod() == "POST") {
            if ($fileInfo = getimagesize($this->resized_photo)) {
                $options = array("method" => "custom", "coords" => array("x1" => $_POST['x'], "y1" => $_POST['y'], "x2" => $_POST['x'] + $_POST['w'], "y2" => $_POST['y'] + $_POST['h']));

                $thumbnail = new sfThumbnail($_POST['w'], $_POST['h'], false, true, 100, "sfImageMagickAdapter", $options);
                $thumbnail->loadFile($this->resized_photo);
                $thumbnail->save($this->cropped_photo, $fileInfo["mime"]);

                $this->generateAndSaveThumbnails($this->cropped_photo, $fileInfo["mime"], 0666);
                $this->getUser()->setFlash('notice', 'Your photo has been cropped successfully.', false);
            }
        }
    }

    protected function generateAndSaveThumbnails($cropped_image = null, $mime_type = "", $file_mode = 0666, $thumb_sizes = array("128", "96", "50", "48", "36", "24")) {
        foreach ($thumb_sizes as $thumb_size) {
            $thumb_nail = new sfThumbnail($thumb_size, $thumb_size, false, true, 100, 'sfImageMagickAdapter');
            $thumb_nail->loadFile($cropped_image);

            $thumb_image = str_replace("cropped", "normal-" . $thumb_size, $cropped_image);

            $thumb_nail->save($thumb_image, $mime_type);
            chmod($thumb_image, $file_mode);
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $profile = $this->getUser()->getProfile();
        $user = $this->getUser()->getProfile()->getUser();
        
        // construct the personal info form based on the user type
        $personalInfoForm = $user->getType() . "PersonalInfoForm";
        $this->form = new $personalInfoForm($profile);
    }

    public function executeUpdate(sfWebRequest $request) {
        $profile = $this->getUser()->getProfile();
        $user = $this->getUser()->getProfile()->getUser();
        
        // construct the personal info form based on the user type
        $personalInfoForm = $user->getType() . "PersonalInfoForm";

        $this->form = new $personalInfoForm($profile);
        $this->processEditForm($request, $this->form, "@personal_info_edit?id=" . $user->getId());
        $this->setTemplate('edit');
    }

    protected function processEditForm(sfWebRequest $request, sfForm $form, $route) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = 'Your personal info has been updated successfully.';
            try {
                $profile = $form->save();
            } catch (Doctrine_Validator_Exception $e) {
                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $profile)));

            $this->getUser()->setFlash('notice', $notice);
            $this->redirect($route);
        } else {
            $this->getUser()->setFlash('error', 'Your personal info has not been saved due to some errors.', false);
        }
    }

}
