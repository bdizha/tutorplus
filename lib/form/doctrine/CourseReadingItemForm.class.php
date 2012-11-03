<?php

/**
 * CourseReadingItem form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseReadingItemForm extends BaseCourseReadingItemForm
{

    public function configure()
    {
        $course_id = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();
        
        $this->validatorSchema['title']->setMessage('required', 'The <b>Title</b> field is required.');
        $this->validatorSchema['author']->setMessage('required', 'The <b>Author</b> field is required.');
        
         $this->setDefaults(array(
            'course_id' => $course_id
        ));
    }

}
