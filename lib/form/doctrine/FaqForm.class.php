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

        $userId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();

        $this->setDefaults(array(
            'user_id' => $userId
        ));
    }

}
