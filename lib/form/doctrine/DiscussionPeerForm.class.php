<?php

/**
 * DiscussionPeer form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionPeerForm extends BaseDiscussionPeerForm
{
  public function configure()
  {unset(
            $this['created_at'], $this['updated_at']
        );

        $profileId = sfContext::getInstance()->getUser()->getId();
        $discussionId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_show_id', "");

        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['subscription_type'] = new sfWidgetFormChoice(array(
                'choices' => DiscussionPeerTable::getInstance()->getSubscriptionTypes(),
                "expanded" => true, "multiple" => false
            ));
        $this->widgetSchema['membership_type'] = new sfWidgetFormChoice(array(
                'choices' => DiscussionPeerTable::getInstance()->getMembershipTypes(),
                "expanded" => true, "multiple" => false
            ));
        $this->widgetSchema['posting_permission_type'] = new sfWidgetFormChoice(array(
                'choices' => DiscussionPeerTable::getInstance()->getPostingPermissionsType(),
                "expanded" => true, "multiple" => false
            ));
        $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
                'choices' => DiscussionPeerTable::getInstance()->getStatues(),
                "expanded" => true, "multiple" => false
            ));

        $this->validatorSchema['nickname']->setMessage('required', 'The <b>Nickname</b> field is required.');

        $this->setDefaults(array(
            'profile_id' => $profileId,
            'discussion_id' => $discussionId,
        ));
  }
}
