<?php

/**
 * InstructorContact form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InstructorContactForm extends BaseInstructorContactForm {

    /**
     * @see ContactForm
     */
    public function configure() {
        parent::configure();

        $instructorId = sfContext::getInstance()->getUser()->getMyAttribute('instructor_show_id', null);

        $this->widgetSchema['instructor_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['address_line_1'] = new sfWidgetFormInputText();
        $this->widgetSchema['address_line_2'] = new sfWidgetFormInputText();
        $this->widgetSchema['postal_address_line_1'] = new sfWidgetFormInputText();
        $this->widgetSchema['postal_address_line_2'] = new sfWidgetFormInputText();

        $this->validatorSchema['address_line_1']->setMessage('required', 'The <b>Physical address line 1</b> field is required.');
        $this->validatorSchema['postal_address_line_1']->setMessage('required', 'The <b>Home address line 1</b> field is required.');

        $this->setDefaults(array(
            'instructor_id' => $instructorId,
        ));
    }

}
