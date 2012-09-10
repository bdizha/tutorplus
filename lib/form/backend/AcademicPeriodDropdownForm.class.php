<?php

class AcademicPeriodDropdownForm extends BaseStudentProgramForm
{
  public function configure()
  {  	
  	$this->useFields(array());
    $this->setWidgets(array(
      'academic_info_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StartAcademicPeriod'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'academic_info_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('StartAcademicPeriod'))),
    ));

    $this->widgetSchema->setNameFormat('academic_period[%s]');

    $this->disableLocalCSRFProtection();
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}