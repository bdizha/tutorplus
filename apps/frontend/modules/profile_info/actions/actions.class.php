<?php

require_once dirname(__FILE__) . '/../lib/profile_infoGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profile_infoGeneratorHelper.class.php';

/**
 * profile_info actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_info
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_infoActions extends autoProfile_infoActions {

  public function executeAjax(sfWebRequest $request) {
    $this->profile = $this->getUser()->getProfile();
  }

}
