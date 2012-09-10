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
        $this->formatDateFields();

        unset(
            $this['created_at'], $this['updated_at']
        );

//        $this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE(array(
//                'width' => 700,
//                'height' => 350,
//                'config' => 'theme_advanced_disable: "anchor,image,cleanup,help"',
//            ));

        $this->widgetSchema['start_date'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
        $this->widgetSchema['end_date'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
        $this->widgetSchema['campuses_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');

        $this->validatorSchema['name']->setMessage('required', 'The <b>name</b> field is required.');
        $this->validatorSchema['code']->setMessage('required', 'The <b>code</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>description</b> field is required.');
        $this->validatorSchema['hours']->setMessage('required', 'The <b>hours</b> field is required.');
        $this->validatorSchema['max_enrolled']->setMessage('required', 'The <b>max enrolled</b> field is required.');
    }

    public function formatDateFields()
    {
        $start_date = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('start_date')->format('d-m-Y');
        $end_date = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('end_date')->format('d-m-Y');
        $this->getObject()->setStartDate($start_date)->setEndDate($end_date);
    }

}