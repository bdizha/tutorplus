<?php

/**
 * ProfileFolderTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProfileFolderTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProfileFolderTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ProfileFolder');
    }

    public function findOrCreateOneByUser($user, $parentFolder)
    {
        if (!is_object($userFolder = $this->getInstance()->findOneByProfileId($user->getId())))
        { 
            // save the user folder
            $folder = new Folder();
            $folder->setName($user->getName());
            $folder->setParentId($parentFolder->getId());
            $folder->getNode()->insertAsLastChildOf($parentFolder);
            
            // save the user folder linking
            $userFolder = new UserFolder();
            $userFolder->setProfileId($user->getId());
            $userFolder->setFolderId($folder->getId());
            $userFolder->save();
        }
        return $userFolder->getFolder();
    }
}