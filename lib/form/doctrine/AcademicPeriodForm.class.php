<?php

/**
 * AcademicPeriod form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AcademicPeriodForm extends BaseAcademicPeriodForm {

    public function configure() {
        $this->widgetSchema['start_date'] = new tpWidgetFormDate();
        $this->widgetSchema['end_date'] = new tpWidgetFormDate();
        $this->widgetSchema['grades_due'] = new tpWidgetFormDate();
        
        $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>name</b> field is required.'));
        $this->validatorSchema['max_credits'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>max credits</b> field is required.'));
    }

}
