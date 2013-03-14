<?php

require_once dirname(__FILE__) . '/../lib/tpProfileInfoGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProfileInfoGeneratorHelper.class.php';
/**
 * tpProfileInfo actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileInfo
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileInfoActions extends autoTpProfileInfoActions
{

    public function executeAjax(sfWebRequest $request)
    {
        $this->profile = $this->getUser()->getProfile();
    }

}
