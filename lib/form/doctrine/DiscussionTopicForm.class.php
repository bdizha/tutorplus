<?php

/**
 * DiscussionTopic form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionTopicForm extends BaseDiscussionTopicForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $userId = sfContext::getInstance()->getUser()->getId();
        $discussionId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_show_id', null);
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['discussion_id'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['subject']->setMessage('required', 'The <b>subject</b> field is required.');
        $this->validatorSchema['message']->setMessage('required', 'The <b>message</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $userId,
            'discussion_id' => $discussionId,
        ));
    }

}
