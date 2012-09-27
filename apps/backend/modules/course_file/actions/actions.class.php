<?php

/**
 * course_file actions.
 *
 * @package    ecollegeplus
 * @subpackage course_file
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_fileActions extends sfActions
{

    public function preExecute()
    {
        if (!$courseId = $this->getUser()->getMyAttribute('course_show_id', null))
        {
            $this->redirect("@course");
        }
        $this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find(array($courseId)), sprintf('Object Course does not exist (%s).', $courseId));
        
        $this->helper = new course_fileGeneratorHelper();

        $fileSystem = FolderTable::getInstance()->findOrCreateOneByNameAndParent(FolderTable::ROOT_FOLDER);

        // find or create the default "courses" folder
        $coursesFolder = FolderTable::getInstance()->findOrCreateOneByNameAndParent(FolderTable::COURSES_FOLDER, $fileSystem);

        // find or create the course folder
        CourseFolderTable::getInstance()->findOrCreateByCoursesAndParentFolder(array(0 => $this->course->toArray()), $coursesFolder);

        $this->fileSystem = FolderTable::getInstance()->fetchByCourse($this->course);
        
        $this->folderPath = $this->getUser()->getMyAttribute('folder_path', null);
        $this->addedFolderId = $this->getUser()->getMyAttribute('added_folder_id', null);
        $this->addedFileId = $this->getUser()->getMyAttribute('added_file_id', null);

        // reset session attributes
        $this->getUser()->setMyAttribute('folder_path', null);
        $this->getUser()->setMyAttribute('added_folder_id', null);
        $this->getUser()->setMyAttribute('added_file_id', null);
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {        
    }

    /**
     * Executes files action
     *
     * @param sfRequest $request A request object
     */
    public function executeFiles(sfWebRequest $request)
    {        
    }

}