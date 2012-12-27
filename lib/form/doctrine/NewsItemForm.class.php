<?php

/**
 * NewsItem form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsItemForm extends BaseNewsItemForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $userId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['lock_until'] = new tpWidgetFormDate();
        $this->widgetSchema['lock_after'] = new tpWidgetFormDate();

        $this->validatorSchema['heading']->setMessage('required', 'The <b>Heading</b> field is required.');
        $this->validatorSchema['blurb']->setMessage('required', 'The <b>Blurb</b> field is required.');
        $this->validatorSchema['body']->setMessage('required', 'The <b>Body</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $userId,
        ));
    }

}
