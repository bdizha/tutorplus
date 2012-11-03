<?php

/**
 * CourseMeetingTime form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseMeetingTimeForm extends BaseCourseMeetingTimeForm
{

    public function configure()
    {
        $course_id = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['day'] = new sfWidgetFormChoice(array(
                'choices' => CourseMeetingTimeTable::getInstance()->getDays(),
            ));

        $this->validatorSchema['day'] = new sfValidatorChoice(array(
                'choices' => CourseMeetingTimeTable::getInstance()->getDayValues(),
            ));

        $this->widgetSchema['to_time'] = new sfWidgetFormChoice(array(
                'choices' => CourseMeetingTimeTable::getInstance()->getTimes(),
            ));

        $this->validatorSchema['to_time'] = new sfValidatorChoice(array(
                'choices' => CourseMeetingTimeTable::getInstance()->getTimesValues(),
            ));

        $this->widgetSchema['from_time'] = new sfWidgetFormChoice(array(
                'choices' => CourseMeetingTimeTable::getInstance()->getTimes(),
            ));

        $this->validatorSchema['from_time'] = new sfValidatorChoice(array(
                'choices' => CourseMeetingTimeTable::getInstance()->getTimesValues(),
            ));
        
         $this->setDefaults(array(
            'course_id' => $course_id
        ));
    }

}
