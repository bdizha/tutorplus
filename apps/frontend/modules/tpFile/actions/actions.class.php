<?php

require_once dirname(__FILE__).'/../lib/tpFileGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/tpFileGeneratorHelper.class.php';

/**
 * tpFile actions.
 *
 * @package    tutorplus.org
 * @subpackage tpFile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpFileActions extends autoTpFileActions
{/**
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

        if ($this->getUser()->getType() == ProfileTable::TYPE_STUDENT)
        {
            CourseFolderTable::getInstance()->findOrCreateByCoursesAndParentFolder($this->getUser()->getStudent()->getCourses(), $coursesFolder);
        }
        elseif ($this->getUser()->getType() == ProfileTable::TYPE_INSTRUCTOR)
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
            try
            {
                // save the generated file on the file system
                $generatedFile = $form->getValue("generated_name");
                $generatedFile->save();

                // save file
                $file = new File();
                $file->setOriginalName($generatedFile->getSanitizedOriginalName());
                $file->setGeneratedName($generatedFile->getGeneratedName());
                $file->setSize($generatedFile->getSize());
                $file->setMimeType($generatedFile->getType());
                $file->setFolderId($form->getValue("folder_id"));
                $file->save();
            }
            catch (sfException $e)
            {
                throw $e;
            }

            // get the newly created file folder path
            $folderPath = FolderTable::getInstance()->getAncestryPathFolderId(array(), $form->getValue("folder_id"));
            $this->getUser()->setMyAttribute('folder_path', $folderPath);
            $this->getUser()->setMyAttribute('added_file_id', $file->getId());
            $this->getUser()->setFlash('notice', 'Your file has been uploaded successfully.', false);
        }
        else
        {
            $this->getUser()->setFlash('error', 'The file has not been saved due to some errors.', false);
        }
    }
}
