<?php

/**
 * CourseSyllabus form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseSyllabusForm extends BaseCourseSyllabusForm {

    public function configure()
    {
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();
    }

}
