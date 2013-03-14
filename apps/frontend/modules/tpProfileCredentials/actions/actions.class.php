<?php

require_once dirname(__FILE__) . '/../lib/tpProfileCredentialsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProfileCredentialsGeneratorHelper.class.php';
/**
 * tpProfileCredentials actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileCredentials
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileCredentialsActions extends autoTpProfileCredentialsActions
{

    public function preExecute()
    {
        $this->profile = $this->getUser()->getProfile();
        $this->forward404Unless($this->profile);
        parent::preExecute();
    }

    public function executeIndex(sfWebRequest $request)
    {
        
    }

    public function executeAjax(sfWebRequest $request)
    {
        
    }

}
