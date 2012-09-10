<?php

class ProfilePhotoForm extends sfForm
{

    public function configure()
    {
        if (!$user_id = $this->getOption('user_id'))
        {
            throw new InvalidArgumentException('You must provide an user object.');
        }
        $this->widgetSchema['filename'] = new sfWidgetFormInputFile();

        $this->setValidator('filename', new sfValidatorFile(array(
                'mime_types' => 'web_images',
                'validated_file_class' => 'sfValidatedPhoto',
                'path' => sfConfig::get('sf_upload_dir') . '/users/' . $user_id . '/',
                ), array('required' => 'Please specify the <b>Photo</b> to upload.')));

        $this->widgetSchema->setNameFormat('profile[%s]');

        $this->disableLocalCSRFProtection();
    }

}