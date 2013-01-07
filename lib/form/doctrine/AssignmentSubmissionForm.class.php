<?php

/**
 * AssignmentSubmission form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssignmentSubmissionForm extends BaseAssignmentSubmissionForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );
        
        $assignmentId = sfContext::getInstance()->getUser()->getMyAttribute('assignment_show_id', null);
        $profileId = sfContext::getInstance()->getUser()->getId();

        $this->widgetSchema['generated_file'] = new sfWidgetFormInputFile();
        $this->widgetSchema['original_file'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['assignment_id'] = new sfWidgetFormInputHidden();
        
        $this->validatorSchema['original_file'] = new sfValidatorString(array('required' => false));
        $this->setValidator('generated_file', new sfValidatorFile(array(
                'mime_types' => FileTable::$mimeTypes,
                'validated_file_class' => 'myValidatedSubmissionFile',
                'path' => sfConfig::get('sf_upload_dir') . '/assignments/' . $assignmentId . '/',
                ), array('required' => 'Please specify the <b>File</b> to upload.', 'mime_types' => "Wrong mime type")));

        $this->setDefaults(array(
            'assignment_id' => $assignmentId,
            'profile_id' => $profileId
        ));

        $this->disableLocalCSRFProtection();
    }

}
