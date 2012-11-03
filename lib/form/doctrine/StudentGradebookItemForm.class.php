<?php

/**
 * StudentGradebookItem form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentGradebookItemForm extends BaseStudentGradebookItemForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['gradebook_item_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['student_id'] = new sfWidgetFormInputHidden();
    }

}
