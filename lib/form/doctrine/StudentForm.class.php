<?php

/**
 * Student form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentForm extends BaseStudentForm
{
    protected function setupInheritance()
    {
        parent::setupInheritance();

        $this->widgetSchema ['number'] = new sfWidgetFormInputText();
        $this->validatorSchema['number'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->widgetSchema->setNameFormat('student[%s]');
    }
}