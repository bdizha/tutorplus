<?php

/**
 * CourseLink form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseLinkForm extends BaseCourseLinkForm
{

    public function configure()
    {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();
        
        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['url'] = new sfValidatorUrl(array('max_length' => 255));
        $this->validatorSchema['url']->setMessage('required', 'The <b>Url</b> field is required.');
        $this->validatorSchema['url']->setMessage('invalid', 'The <b>Url</b> should be in right foramt (e.g http://something.something).');
        
         $this->setDefaults(array(
            'course_id' => $courseId
        ));
    }

}
