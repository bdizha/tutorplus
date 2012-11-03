<?php

/**
 * GradebookScale form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GradebookScaleForm extends BaseGradebookScaleForm
{

    public function configure()
    {
        $this->useFields(array("gradebook_id", "code", "min_points", "max_points"));        
        $gradebookId = sfContext::getInstance()->getUser()->getMyAttribute('gradebook_show_id', "");

        $this->widgetSchema['gradebook_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['min_points'] = new sfWidgetFormChoice(array("choices" => range(0, 100)), array());
        $this->widgetSchema['max_points'] = new sfWidgetFormChoice(array("choices" => range(0, 100)), array());

        $this->validatorSchema['code'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Grade</b> field is required.'));
        $this->validatorSchema['min_points'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Min points</b> field is required.'));
        $this->validatorSchema['max_points'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Max points</b> field is required.'));
        
        $this->widgetSchema['gradebook_id'] = new sfWidgetFormInputHidden();
        $this->validatorSchema['code'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Code</b> field is required.'));

        $this->setDefaults(array(
            'gradebook_id' => $gradebookId,
        ));
        
        $this->mergePostValidator(new sfValidatorSchemaCompare('min_points', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'max_points', array(), array('invalid' => 'The <b>Min points</b> value should be less than the <b>Max points</b> one.')));
    }

}
