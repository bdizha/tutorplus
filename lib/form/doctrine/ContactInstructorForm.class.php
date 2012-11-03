<?php

/**
 * ContactInstructor form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactInstructorForm extends BaseContactInstructorForm
{

    /**
     * @see ContactForm
     */
    public function configure()
    {
        parent::configure();
        $this->widgetSchema['instructor_id'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['postal_address_line_1']->setMessage('required', 'The <b>Address line 1</b> field is required.');
        $this->validatorSchema['address_line_1']->setMessage('required', 'The <b>Home address 1</b> field is required.');
    }

}
