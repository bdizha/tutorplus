<?php

/**
 * BulletinBoardPostComment form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BulletinBoardPostCommentForm extends BaseBulletinBoardPostCommentForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $profile_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['bulletin_board_post_id'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['content']->setMessage('required', 'The <b>Content</b> field is required.');

        $this->setDefaults(array(
            'profile_id' => $profile_id
        ));

        $this->disableLocalCSRFProtection();
    }

}
