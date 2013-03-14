<?php
/**
 * tpAccountSettings actions.
 *
 * @package    tutorplus.org
 * @subpackage tpAccountSettings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpAccountSettingsActions extends sfActions
{
    public function preExecute()
    {
        $this->profile = $this->getUser()->getProfile();
        $this->forward404Unless($this->profile);
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
     * Executes ajax action
     *
     * @param sfRequest $request A request object
     */
    public function executeAjax(sfWebRequest $request)
    {        
    }
}
