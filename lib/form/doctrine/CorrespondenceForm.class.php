<?php

/**
 * Correspondence form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CorrespondenceForm extends BaseCorrespondenceForm
{

    public function configure()
    {
        unset(
            $this['status'], $this['type']
        );

        $profile_id = sfContext::getInstance()->getUser()->getId();
        $correspondent_id = new sfWidgetFormDoctrineJQueryAutocompleter(array(
                'url' => '/invite_correspondence',
                'model' => 'sfGuardUser',
                'value_callback' => 'findOneById'
            ));

        $this->widgetSchema['innitiator_id'] = new sfWidgetFormInputHidden();
        $this->setWidget('correspondent_id', $correspondent_id);

        $this->setDefaults(array(
            'innitiator_id' => $profile_id,
        ));

        $this->disableLocalCSRFProtection();
    }

}
