<?php

/**
 * News form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsForm extends BaseNewsForm
{

    public function configure()
    {
        $this->formatDateFields();

        unset(
            $this['created_at'], $this['updated_at']
        );

        $user_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['lock_until'] = new sfWidgetFormJQueryDate(array("change_month" => true));
        $this->widgetSchema['lock_after'] = new sfWidgetFormJQueryDate(array("change_month" => true));

        $this->validatorSchema['heading']->setMessage('required', 'The <b>Heading</b> field is required.');
        $this->validatorSchema['blurb']->setMessage('required', 'The <b>Blurb</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $user_id,
        ));
    }

    public function formatDateFields()
    {
        $lock_until = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('lock_until')->format('d-m-Y');
        $lock_after = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('lock_after')->format('d-m-Y');
        $this->getObject()->setLockUntil($lock_until)->setLockAfter($lock_after);
    }

}