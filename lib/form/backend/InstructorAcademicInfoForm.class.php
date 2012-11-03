<?php

/**
 * InstructorAcademicInfo form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InstructorAcademicInfoForm extends InstructorForm {

    protected function setupInheritance() {
        parent::setupInheritance();
        $this->validatorSchema['high_school'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        $this->validatorSchema['studied_at'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        $this->validatorSchema['current_study'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        
        $this->validatorSchema['high_school']->setMessage('required', 'The <b>High school</b> field is required.');
        $this->validatorSchema['studied_at']->setMessage('required', 'The <b>Studied at</b> field is required.');
        $this->validatorSchema['current_study']->setMessage('required', 'The <b>Current study</b> field is required.');
        $this->widgetSchema->setNameFormat('academic_info[%s]');

        foreach ($this->getWidgetSchema()->getFields() as $name => $field):
            if (!in_array($name, array('high_school', 'studied_at', 'current_study'))):
                $this->widgetSchema[$name] = new sfWidgetFormInputHidden();
            endif;
        endforeach;
    }

    public function configure() {
        parent::configure();

        foreach ($this->getWidgetSchema()->getFields() as $name => $field):
            if (!in_array($name, array('high_school', 'studied_at', 'current_study'))):
                $this->widgetSchema[$name] = new sfWidgetFormInputHidden();
            endif;
        endforeach;
    }

}