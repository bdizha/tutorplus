<?php

/**
 * PersonalInfo form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonalInfoForm extends StudentForm {

    protected function setupInheritance() {
        parent::setupInheritance();
        $this->validatorSchema['about']->setMessage('max_length', 'Please specify the max length message here');
        $this->widgetSchema->setNameFormat('personal_info[%s]');

        foreach ($this->getWidgetSchema()->getFields() as $name => $field):
            if (!in_array($name, array('about', 'number', 'gender'))):
                $this->widgetSchema[$name] = new sfWidgetFormInputHidden();
            endif;
        endforeach;
    }

    public function configure() {
        parent::configure();

        foreach ($this->getWidgetSchema()->getFields() as $name => $field):
            if (!in_array($name, array('about', 'gender'))):
                $this->widgetSchema[$name] = new sfWidgetFormInputHidden();
            endif;
        endforeach;
    }

}