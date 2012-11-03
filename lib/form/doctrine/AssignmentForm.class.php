<?php

/**
 * Assignment form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssignmentForm extends BaseAssignmentForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['due_date'] = new tpWidgetFormDate();
        $this->widgetSchema['lock_until'] = new tpWidgetFormDate();
        $this->widgetSchema['lock_after'] = new tpWidgetFormDate();

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

}
