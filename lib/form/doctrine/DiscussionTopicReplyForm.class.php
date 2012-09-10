<?php

/**
 * DiscussionTopicReply form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionTopicReplyForm extends BaseDiscussionTopicReplyForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $userId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_topic_message_id'] = new sfWidgetFormInputHidden();
        
        $this->validatorSchema['reply']->setMessage('required', 'The <b>reply</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $userId,
        ));

        $this->disableLocalCSRFProtection();
    }

}
