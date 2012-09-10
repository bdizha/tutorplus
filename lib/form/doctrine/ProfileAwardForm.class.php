<?php

/**
 * ProfileAward form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileAwardForm extends BaseProfileAwardForm
{

    public function configure()
    {
        $userId = sfContext::getInstance()->getUser()->getId();

        $this->widgetSchema["user_id"] = new sfWidgetFormInputHidden();
        $this->widgetSchema['year'] = new sfWidgetFormChoice(array(
                'choices' => array_combine(ProfileAwardTable::getInstance()->getYears(), ProfileQualificationTable::getInstance()->getYears()),
            ));

        $this->validatorSchema['institution'] = new sfValidatorString(array('required' => true), array('required' => 'The <b>Institution</b> field is required.'));
        $this->validatorSchema['description'] = new sfValidatorString(array('required' => true), array('required' => 'The <b>Description</b> field is required.'));

        $this->setDefaults(array(
            'user_id' => $userId,
        ));
    }

}
