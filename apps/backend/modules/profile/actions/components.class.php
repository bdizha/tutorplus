<?php

/**
 * profile components.
 *
 * @package    tutorplus
 * @subpackage profile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileComponents extends sfComponents
{

    /**
     * Executes info action
     *
     * @param sfRequest $request A request object
     */
    public function executeInfo(sfWebRequest $request)
    {
       $this->profile = $this->getUser()->getProfile();
       $this->profileType = strtolower($this->getUser()->getUserType());
       
       //$this->peers = CorrespondenceTable::getInstance()->retrieveCorrespondencesByUserId($this->getUser()->getId(), 12);
    }
}
