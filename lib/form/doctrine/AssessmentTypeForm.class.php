<?php

/**
 * AssessmentType form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssessmentTypeForm extends BaseAssessmentTypeForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $course_id = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['weight']->setMessage('required', 'The <b>Weight</b> field is required.');

        $this->setDefaults(array(
            'course_id' => $course_id,
        ));
    }

}
