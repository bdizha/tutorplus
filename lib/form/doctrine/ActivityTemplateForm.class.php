<?php

/**
 * ActivityTemplate form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ActivityTemplateForm extends BaseActivityTemplateForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
                    'choices' => ActivityTemplateTable::getInstance()->getTypes(),
                        )
        );

        $this->validatorSchema['patterns']->setMessage('required', 'The <b>Patterns</b> field is required.');
        $this->validatorSchema['content']->setMessage('required', 'The <b>Content</b> field is required.');
        $this->validatorSchema['type'] = new sfValidatorChoice(array(
                    'choices' => array_keys(ActivityTemplateTable::getInstance()->getTypes()),
                        )
        );
    }

}
