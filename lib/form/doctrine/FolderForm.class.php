<?php

/**
 * Folder form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FolderForm extends BaseFolderForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at'], $this['lft'], $this['rgt'], $this['level']
        );

        $folders = array();
        $user = sfContext::getInstance()->getUser();
        $object = $object = $user->getProfile()->getUser();        
        $folderSection = $user->getMyAttribute('folder_section', FolderTable::DOCUMENTS_SECTION);

        if ($folderSection == FolderTable::DOCUMENTS_SECTION)
        {
            $object = $user->getProfile()->getUser();
        }
        elseif ($folderSection == FolderTable::COURSES_SECTION)
        {
            $courseId = $user->getMyAttribute('course_show_id', null);
            if (!$courseId)
                die("redirect");
            $object = CourseTable::getInstance()->find($courseId);
        }

        $folders = FolderTable::getInstance()->getPossibleParentFoldersByObject($object, $folderSection);

        $this->widgetSchema['type'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['parent_id'] = new sfWidgetFormChoice(array(
                'choices' => $folders,
            ));

        $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>name</b> field is required.'));
        $this->validatorSchema['parent_id'] = new sfValidatorChoice(array(
                'choices' => array_keys($folders),
            ));
    }

    protected function doSave($con = null)
    {
        parent::doSave($con);
        $parentId = $this->getValue('parent_id');

        if ($this->isNew())
        {
            if (!$parentId)
            {
                // we're new and we have no parent id, so save as root
                $this->getObject()->getTable()->getTree()->createRoot($this->getObject()); //calls $this->object->save internally
            }
            else
            {
                //form validation ensures an existing id for $this->parentId
                $parent = $this->object->getTable()->find($parentId);
                $this->getObject()->getNode()->insertAsLastChildOf($parent); //calls $this->object->save internally
            }
        }
    }

}
