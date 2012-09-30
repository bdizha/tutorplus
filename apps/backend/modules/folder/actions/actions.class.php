<?php

require_once dirname(__FILE__) . '/../lib/folderGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/folderGeneratorHelper.class.php';

/**
 * folder actions.
 *
 * @package    ecollegeplus
 * @subpackage folder
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class folderActions extends autoFolderActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $fileSystem = FolderTable::getInstance()->findOrCreateOneByNameAndParent(FolderTable::ROOT_FOLDER);

        // find or create the user folder        
        $userFolder = UserFolderTable::getInstance()->findOrCreateOneByUser($this->getUser(), $fileSystem);

        // find or create the default user "Personal" folder
        FolderTable::getInstance()->findOrCreateOneByNameAndParent(FolderTable::PERSONAL_FOLDER, $userFolder);

        // find or create the default user "Courses" folder
        $coursesFolder = FolderTable::getInstance()->findOrCreateOneByNameAndParent(FolderTable::COURSES_FOLDER, $userFolder);

        if ($this->getUser()->getType() == sfGuardUserTable::TYPE_STUDENT)
        {
            CourseFolderTable::getInstance()->findOrCreateByCoursesAndParentFolder($this->getUser()->getStudent()->getCourses(), $coursesFolder);
        }
        elseif ($this->getUser()->getType() == sfGuardUserTable::TYPE_INSTRUCTOR)
        {
            CourseFolderTable::getInstance()->findOrCreateByCoursesAndParentFolder($this->getUser()->getInstructor()->getCourses(), $coursesFolder);
        }

        $this->fileSystem = FolderTable::getInstance()->fetchByUser($this->getUser());
        $this->folderPath = $this->getUser()->getMyAttribute('folder_path', null);
        $this->addedFolderId = $this->getUser()->getMyAttribute('added_folder_id', null);
        $this->addedFileId = $this->getUser()->getMyAttribute('added_file_id', null);

        // reset session attributes
        $this->getUser()->setMyAttribute('folder_path', null);
        $this->getUser()->setMyAttribute('added_folder_id', null);
        $this->getUser()->setMyAttribute('added_file_id', null);
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try
            {
                $folder = $form->save();
            }
            catch (Doctrine_Validator_Exception $e)
            {
                $errorStack = $form->getObject()->getErrorStack();
                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors)
                {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $folder)));

            if ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@folder_new');
            }
            else
            {
                $this->getUser()->setFlash('notice', $notice);

                // get the newly created folder path
                $folderPath = FolderTable::getInstance()->getAncestryPathFolderId(array(), $folder->getId());
                $this->getUser()->setMyAttribute('folder_path', $folderPath);
                $this->getUser()->setMyAttribute('added_folder_id', $folder->getId());

                $this->redirect(array('sf_route' => 'folder_edit', 'sf_subject' => $folder));
            }
        }
        else
        {
//            foreach ($form as $name => $field){
//            if ($field->hasError())
//            {
//                echo '<li>' . $name . " >>><<<< " . $field->getError() . '</li>';
//            }
//            if ($form->hasGlobalErrors())
//            {
//                foreach ($form->getGlobalErrors() as $error)
//                {
//                    echo '<li>' . $error . '</li>';
//                }
//                $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
//            }
//            }
//            die("ddd");
        }
    }

    public function executeSection(sfWebRequest $request)
    {
        if ($request->getParameter("section"))
        {
            $this->getUser()->setMyAttribute('folder_section', $request->getParameter("section"));
        }
    }

}

