<?php

/**
 * GradebookItem form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GradebookItemForm extends BaseGradebookItemForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );
        
        $gradebookId = sfContext::getInstance()->getUser()->getMyAttribute('gradebook_show_id', "");
        
        $this->widgetSchema['gradebook_id'] = new sfWidgetFormInputHidden();
        $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Name</b> field is required.'));

        $this->setDefaults(array(
            'gradebook_id' => $gradebookId,
        ));
    }

}
