<?php

/**
 * Course form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseForm extends BaseCourseForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

//        $this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE(array(
//                'width' => 700,
//                'height' => 350,
//                'config' => 'theme_advanced_disable: "anchor,image,cleanup,help"',
//            ));

        $this->widgetSchema['start_date'] = new sfWidgetFormJQueryDate(array("min" => 0, "max" => 4000000));
        $this->widgetSchema['end_date'] = new sfWidgetFormJQueryDate(array("min" => 0, "max" => 4000000));

        $this->validatorSchema['name']->setMessage('required', 'The <b>name</b> field is required.');
        $this->validatorSchema['code']->setMessage('required', 'The <b>code</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>description</b> field is required.');
        $this->validatorSchema['hours']->setMessage('required', 'The <b>hours</b> field is required.');
        $this->validatorSchema['max_enrolled']->setMessage('required', 'The <b>max enrolled</b> field is required.');
    }
}