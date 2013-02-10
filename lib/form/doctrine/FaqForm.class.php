<?php

/**
 * Faq form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FaqForm extends BaseFaqForm {

	public function configure() {
		unset(
				$this['created_at'], $this['updated_at']
		);

		$profileId = sfContext::getInstance()->getUser()->getId();
		$this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();

		$this->widgetSchema['position'] = new sfWidgetFormChoice(array(
				'choices' => FaqTable::getInstance()->getPositions(),
		)
		);
		
		$this->validatorSchema['position'] = new sfValidatorChoice(array(
				'choices' => FaqTable::getInstance()->getPositions()
		)
		);

		$this->setDefaults(array(
				'profile_id' => $profileId
		));
	}

}
