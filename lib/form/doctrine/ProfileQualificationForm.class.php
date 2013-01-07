<?php

/**
 * ProfileQualification form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileQualificationForm extends BaseProfileQualificationForm
{

    public function configure()
    {
        $profile_id = sfContext::getInstance()->getUser()->getId();

        $this->widgetSchema["profile_id"] = new sfWidgetFormInputHidden();
        $this->widgetSchema['year'] = new sfWidgetFormChoice(array(
                'choices' => array_combine(ProfileQualificationTable::getInstance()->getYears(), ProfileQualificationTable::getInstance()->getYears()),
            ));

        $this->validatorSchema['institution'] = new sfValidatorString(array('required' => true), array('required' => 'The <b>Institution</b> field is required.'));
        $this->validatorSchema['description'] = new sfValidatorString(array('required' => true), array('required' => 'The <b>Description</b> field is required.'));

        $this->setDefaults(array(
            'profile_id' => $profile_id,
        ));
    }

}
