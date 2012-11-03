<?php

/**
 * DiscussionTopicMessage form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionTopicMessageForm extends BaseDiscussionTopicMessageForm
{
  
    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $userId = sfContext::getInstance()->getUser()->getId();
        $discussionTopicId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_topic_show_id', "");
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_topic_id'] = new sfWidgetFormInputHidden();
        
        $this->validatorSchema['message']->setMessage('required', 'The <b>message</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $userId,
            'discussion_topic_id' => $discussionTopicId,
        ));

        $this->disableLocalCSRFProtection();
    }
}
