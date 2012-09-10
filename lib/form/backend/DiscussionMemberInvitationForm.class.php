<?php

/**
 * Description of DiscussionMemberInvitationForm
 *
 * @author graphifox
 */
class DiscussionMemberInvitationForm extends DiscussionMemberForm
{

    public function configure()
    {
        $this->useFields(array(
            'user_id',
            'discussion_id',
        ));

        $userId = sfContext::getInstance()->getUser()->getId();
        $discussionShowId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_show_id', "");

        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['email_addresses'] = new sfWidgetFormInput(array(), array("class" => "hide"));
        $this->widgetSchema['message'] = new sfWidgetFormTextarea();
        
        $this->validatorSchema['email_addresses'] = new sfValidatorString(array('max_length' => 255), array('required' => 'Please choose at least a member.'));
        $this->validatorSchema['message'] = new sfValidatorString(array(), array('required' => 'The <b>Message</b> field is required.'));

        $this->widgetSchema->setNameFormat('discussion_members[%s]');

        $this->setDefaults(array(
            'user_id' => $userId,
            'discussion_id' => $discussionShowId,
        ));
    }

}