<?php

/**
 * DiscussionPost form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionPostForm extends BaseDiscussionPostForm {

  public function configure() {
    unset(
        $this['created_at'], $this['updated_at']
    );

    $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['discussion_topic_id'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['message']->setMessage('required', 'The <b>message</b> field is required.');
    $this->disableLocalCSRFProtection();
  }

}
