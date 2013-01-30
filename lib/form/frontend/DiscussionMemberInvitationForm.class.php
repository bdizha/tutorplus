<?php

/**
 * Description of DiscussionPeerInvitationForm
 *
 * @author graphifox
 */
class DiscussionPeerInvitationForm extends DiscussionPeerForm
{

    public function configure()
    {
        $this->useFields(array(
            'profile_id',
            'discussion_group_id',
        ));

        $profileId = sfContext::getInstance()->getUser()->getId();
        $discussionGroupShowId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_group_show_id', "");

        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_group_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['email_addresses'] = new sfWidgetFormInput(array(), array("class" => "hide"));
        $this->widgetSchema['message'] = new sfWidgetFormTextarea();
        
        $this->validatorSchema['email_addresses'] = new sfValidatorString(array('max_length' => 255), array('required' => 'Please choose at least a member.'));
        $this->validatorSchema['message'] = new sfValidatorString(array(), array('required' => 'The <b>Message</b> field is required.'));

        $this->widgetSchema->setNameFormat('discussion_peers[%s]');

        $this->setDefaults(array(
            'profile_id' => $profileId,
            'discussion_group_id' => $discussionGroupShowId,
        ));
    }

}