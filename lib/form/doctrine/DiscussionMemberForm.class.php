<?php

/**
 * DiscussionMember form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionMemberForm extends BaseDiscussionMemberForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $user_id = sfContext::getInstance()->getUser()->getId();
        $group_show_id = sfContext::getInstance()->getUser()->getMyAttribute('group_show_id', "");

        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_id'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['subscription_type'] = new sfWidgetFormChoice(array(
                'choices' => DiscussionMemberTable::getInstance()->getSubscriptionTypes(),
                "expanded" => true, "multiple" => false
            ));

        $this->widgetSchema['membership_type'] = new sfWidgetFormChoice(array(
                'choices' => DiscussionMemberTable::getInstance()->getMembershipTypes(),
                "expanded" => true, "multiple" => false
            ));

        $this->widgetSchema['posting_permission_type'] = new sfWidgetFormChoice(array(
                'choices' => DiscussionMemberTable::getInstance()->getPostingPermissionsType(),
                "expanded" => true, "multiple" => false
            ));

        $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
                'choices' => DiscussionMemberTable::getInstance()->getStatues(),
                "expanded" => true, "multiple" => false
            ));

        $this->validatorSchema['nickname']->setMessage('required', 'The <b>nickname</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $user_id,
            'discussion_id' => $group_show_id,
        ));
    }

}
