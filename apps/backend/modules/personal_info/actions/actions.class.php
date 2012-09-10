<?php

/**
 * personal_info actions.
 *
 * @package    ecollegeplus
 * @subpackage personal_info
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class personal_infoActions extends sfActions
{

    public function preExecute()
    {
        $photo_extension = "png";
        $resized_photo = sfFinder::type('any')->maxdepth(0)
            ->relative()
            ->name('normal-resized.*')
            ->in(sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId());

        if (isset($resized_photo[0]))
        {
            $photo_parts = explode(".", $resized_photo[0]);

            if (count($photo_parts) == 2)
            {
                $photo_extension = $photo_parts[1];
            }
        }

        $this->profile = $this->getUser()->getProfile();
        $this->resized_photo = sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId() . "/normal-resized." . $photo_extension;
        $this->cropped_photo = sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId() . "/cropped." . $photo_extension;
        $this->resized_photo_dir = sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getUser()->getId();
        $this->resized_photo_src = "/uploads/users/" . $this->getUser()->getId() . "/resized." . $photo_extension;

        $this->forward404Unless($this->profile);
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        
    }

    /**
     * Executes student details action
     *
     * @param sfRequest $request A request object
     */
    public function executeStudentDetails(sfWebRequest $request)
    {
        
    }

    /**
     * Executes instructor details action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstructorDetails(sfWebRequest $request)
    {
        
    }

    public function executeProfilePhoto(sfWebRequest $request)
    {
        
    }

    public function executeUploadPhoto(sfWebRequest $request)
    {
        $this->form = new ProfilePhotoForm(null, array('user_id' => $this->getUser()->getId()));
        if ($request->getMethod() == "POST")
        {
            $this->processForm($request, $this->form);
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            try
            {
                if (!is_dir($this->resized_photo_dir))
                {
                    mkdir($this->resized_photo_dir);
                }

                $photo = $form->getValue("filename");
                $photo->save();
                $photo->resizePhoto();
            }
            catch (sfException $e)
            {
                throw $e;
            }
            $this->getUser()->setFlash('notice', 'Your photo has been uploaded successfully.', false);
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeCropPhoto(sfWebRequest $request)
    {
        // steps to follow:
        // resize the uploaded image to a restricted with and height
        // crop the image to a 96 x 96 version
        // save or update the crop image
        if ($request->getMethod() == "POST")
        {
            if ($file_info = getimagesize($this->resized_photo))
            {
                $options = array("method" => "custom", "coords" => array("x1" => $_POST['x'], "y1" => $_POST['y'], "x2" => $_POST['x'] + $_POST['w'], "y2" => $_POST['y'] + $_POST['h']));

                $thumbnail = new sfThumbnail($_POST['w'], $_POST['h'], false, true, 100, "sfImageMagickAdapter", $options);
                $thumbnail->loadFile($this->resized_photo);
                $thumbnail->save($this->cropped_photo, $file_info["mime"]);

                $this->generateAndSaveThumbnails($this->cropped_photo, $file_info["mime"], 0666);
                $this->getUser()->setFlash('notice', 'Your photo has been cropped successfully.', false);
            }
        }
    }

    protected function generateAndSaveThumbnails($cropped_image = null, $mime_type = "", $file_mode = 0666, $thumb_sizes = array("128", "96", "50", "48", "32", "24"))
    {
        foreach ($thumb_sizes as $thumb_size)
        {
            $thumb_nail = new sfThumbnail($thumb_size, $thumb_size, false, true, 100, 'sfImageMagickAdapter');
            $thumb_nail->loadFile($cropped_image);

            $thumb_image = str_replace("cropped", "normal-" . $thumb_size, $cropped_image);

            $thumb_nail->save($thumb_image, $mime_type);
            chmod($thumb_image, $file_mode);
        }
    }

}
