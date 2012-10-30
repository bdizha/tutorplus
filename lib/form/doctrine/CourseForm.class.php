<?php

/**
 * Course form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseForm extends BaseCourseForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

//        $this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE(array(
//                'width' => 700,
//                'height' => 350,
//                'config' => 'theme_advanced_disable: "anchor,image,cleanup,help"',
//            ));

        $this->widgetSchema['start_date'] = new tpWidgetFormDate();
        $this->widgetSchema['end_date'] = new tpWidgetFormDate();

        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['code']->setMessage('required', 'The <b>Code</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');
        $this->validatorSchema['hours']->setMessage('required', 'The <b>Hours</b> field is required.');
        $this->validatorSchema['max_enrolled']->setMessage('required', 'The <b>Max enrolled</b> field is required.');
        $this->validatorSchema['start_date']->setMessage('required', 'The <b>Start Date</b> field is required.');
        $this->validatorSchema['end_date']->setMessage('required', 'The <b>End Date</b> field is required.');
    }

}