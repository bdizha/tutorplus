<?php

/**
 * DiscussionComment form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionCommentForm extends BaseDiscussionCommentForm {

    public function configure() {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $profileId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_post_id'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['reply']->setMessage('required', 'The <b>reply</b> field is required.');

        $this->setDefaults(array(
            'profile_id' => $profileId,
        ));

        $this->disableLocalCSRFProtection();
    }

}
