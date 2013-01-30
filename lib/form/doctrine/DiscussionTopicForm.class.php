<?php

/**
 * DiscussionTopic form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionTopicForm extends BaseDiscussionTopicForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $profileId = sfContext::getInstance()->getUser()->getId();
        $discussionGroupId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_group_show_id', null);
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_group_id'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['type']->setMessage('required', 'The <b>Post type</b> field is required.');
        $this->validatorSchema['subject']->setMessage('required', 'The <b>Subject</b> field is required.');
        $this->validatorSchema['message']->setMessage('required', 'The <b>Message</b> field is required.');

        $this->setDefaults(array(
            'profile_id' => $profileId,
            'discussion_group_id' => $discussionGroupId,
        ));
    }

}
