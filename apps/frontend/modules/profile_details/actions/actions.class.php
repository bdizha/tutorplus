<?php

require_once dirname(__FILE__) . '/../lib/profile_detailsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profile_detailsGeneratorHelper.class.php';

/**
 * profile_details actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_details
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_detailsActions extends autoProfile_detailsActions {

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request) {
    $this->profile = $this->getUser()->getProfile();
  }

  public function executeAjax(sfWebRequest $request) {
    $this->profile = $this->getUser()->getProfile();
  }

}
