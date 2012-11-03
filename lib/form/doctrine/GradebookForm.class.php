<?php

/**
 * Gradebook form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GradebookForm extends BaseGradebookForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );
        
        $this->widgetSchema['items'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();

        $student_gradebook_item_collection_form = new StudentGradebookItemCollectionForm(null, array(
                'gradebook' => $this->getObject(),
            ));

        $this->embedForm('grades', $student_gradebook_item_collection_form);
    }

}
