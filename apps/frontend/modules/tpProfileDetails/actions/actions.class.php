<?php

require_once dirname(__FILE__) . '/../lib/tpProfileDetailsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProfileDetailsGeneratorHelper.class.php';
/**
 * tpProfileDetails actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileDetails
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileDetailsActions extends autoTpProfileDetailsActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->profile = $this->getUser()->getProfile();
    }

    public function executeAjax(sfWebRequest $request)
    {
        $this->profile = $this->getUser()->getProfile();
    }

}
