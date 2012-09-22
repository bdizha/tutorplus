<?php

/**
 * Assignment form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssignmentForm extends BaseAssignmentForm
{

    public function configure()
    {
        $this->formatDateFields();

        unset(
            $this['created_at'], $this['updated_at']
        );

        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['due_date'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
        $this->widgetSchema['lock_until'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
        $this->widgetSchema['lock_after'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));

        $this->widgetSchema['submission'] = new sfWidgetFormChoice(array(
                'choices' => AssignmentTable::getInstance()->getSubmissionTypes(),
                )
        );

        $this->widgetSchema['graded_by'] = new sfWidgetFormChoice(array(
                'choices' => AssignmentTable::getInstance()->getGradingTypes()
                )
        );

        $this->validatorSchema['submission'] = new sfValidatorChoice(array(
                'choices' => array_keys(AssignmentTable::getInstance()->getSubmissionTypes()),
                )
        );

        $this->validatorSchema['graded_by'] = new sfValidatorChoice(array(
                'choices' => array_keys(AssignmentTable::getInstance()->getGradingTypes()),
                )
        );

        $this->validatorSchema['title']->setMessage('required', 'The <b>Title</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');
        $this->validatorSchema['points']->setMessage('required', 'The <b>Points</b> field is required.');

        $this->validatorSchema['title']->setMessage('required', 'The <b>Title</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');
        $this->validatorSchema['points']->setMessage('required', 'The <b>Points</b> field is required.');

        $this->setDefaults(array(
            'course_id' => $courseId
            )
        );
    }

    public function formatDateFields()
    {
        $due_date = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('due_date')->format('d-m-Y');
        $lock_until = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('lock_until')->format('d-m-Y');
        $lock_after = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('lock_after')->format('d-m-Y');
        $this->getObject()->setDueDate($due_date)->setLockUntil($lock_until)->setLockAfter($lock_after);
    }

}
