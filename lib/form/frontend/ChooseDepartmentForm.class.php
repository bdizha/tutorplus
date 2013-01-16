<?php

class ChooseDepartmentForm extends BaseFormDoctrine
{

    public function setup()
    {
        $this->setWidgets(array(
            'faculty_id' => new sfWidgetFormDoctrineChoice(array('model' => "Faculty", 'add_empty' => "-- Faculty --")),
            'department_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => "-- Department --")),
        ));
        
         $this->widgetSchema['faculty_id']->setLabel('Choose faculty');
         $this->widgetSchema['department_id']->setLabel('Choose department');

        $this->setValidators(array(
            'faculty_id' => new sfValidatorDoctrineChoice(array('model' => "Faculty")),
            'department_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'))),
        ));

        $this->widgetSchema->setNameFormat('department[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
        parent::setup();
    }

    public function getModelName()
    {
        return 'Program';
    }

}