<?php

/**
 * BulletinBoardPost form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BulletinBoardPostForm extends BaseBulletinBoardPostForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $profile_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden(array("default" => $profile_id));
        $this->validatorSchema['post']->setMessage('required', 'The <b>Post</b> field is required.');

        $this->disableLocalCSRFProtection();

        $this->setDefaults(
            array("type" => 1)
        );
    }

}
