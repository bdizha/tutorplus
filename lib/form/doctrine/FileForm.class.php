<?php

/**
 * File form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FileForm extends BaseFileForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $folders = array();
        $user = sfContext::getInstance()->getUser();
        $object = $object = $user->getProfile()->getProfile();
        $folderSection = $user->getMyAttribute('folder_section', FolderTable::DOCUMENTS_SECTION);

        if ($folderSection == FolderTable::DOCUMENTS_SECTION)
        {
            $object = $user->getProfile()->getProfile();
        }
        elseif ($folderSection == FolderTable::COURSES_SECTION)
        {
            $courseId = $user->getMyAttribute('course_show_id', null);
            if (!$courseId)
                die("redirect");
            $object = CourseTable::getInstance()->find($courseId);
        }

        $folders = FolderTable::getInstance()->getPossibleParentFoldersByObject($object, $folderSection);

        $this->widgetSchema['folder_id'] = new sfWidgetFormChoice(array(
                'choices' => $folders,
                )
        );
        $this->widgetSchema['mime_type'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['size'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['generated_name'] = new sfWidgetFormInputFile();
        $this->widgetSchema['original_name'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['folder_id'] = new sfValidatorChoice(array(
                'choices' => array_keys($folders),
                )
        );
        $this->validatorSchema['original_name'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['mime_type'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['size'] = new sfValidatorInteger(array('required' => false));

        $this->setValidator('generated_name', new sfValidatorFile(array(
                'validated_file_class' => 'myValidatedFile',
                'path' => sfConfig::get('sf_upload_dir') . '/assets/',
                'mime_types' => FileTable::$mimeTypes,
                ), array('required' => 'Please specify the <b>File</b> to upload.', 'mime_types' => "Wrong mime type")
            )
        );

        $this->disableLocalCSRFProtection();
    }

}