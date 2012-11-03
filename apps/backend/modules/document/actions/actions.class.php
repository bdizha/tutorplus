<?php

require_once dirname(__FILE__).'/../lib/documentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/documentGeneratorHelper.class.php';

/**
 * document actions.
 *
 * @package    tutorplus
 * @subpackage document
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class documentActions extends autoDocumentActions
{
    public function executeIndex(sfWebRequest $request)
    {
        parent::executeIndex($request);
    }
    
    public function executeFileSystem(sfWebRequest $request)
    {
        $folder = $request->getParameter('folder', "/");
        if($folder)
        { 
            $folder = new Folder();
            echo $folder->getDescendants();
            exit("<script type=\"text/javascript\">
                    $(function(){
                        $(\"#browser\").treeview();
                    });
                </script>");
        }
    }
    
    public function executeDirectoryDescendants(sfWebRequest $request)
    {
        $parent_id = $request->getParameter('parent_id', "14");
        if($parent_id)
        {
            $directory_listing = FolderTable::getInstance()->fetchByParentId($parent_id);
            
            die($directory_listing);
        }
        die("This folder is empty.");
    }	
}
