<?php

require_once dirname(__FILE__) . '/../lib/profile_credentialsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profile_credentialsGeneratorHelper.class.php';

/**
 * profile_credentials actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_credentials
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_credentialsActions extends autoProfile_credentialsActions {

  public function preExecute() {
    $this->profile = $this->getUser()->getProfile();
    $this->forward404Unless($this->profile);
    parent::preExecute();
  }

  public function executeIndex(sfWebRequest $request) {
    
  }

  public function executeAjax(sfWebRequest $request) {
    
  }

}
