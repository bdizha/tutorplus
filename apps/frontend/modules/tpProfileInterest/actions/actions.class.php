<?php

require_once dirname(__FILE__) . '/../lib/tpProfileInterestGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProfileInterestGeneratorHelper.class.php';
/**
 * tpProfileInterest actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileInterest
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileInterestActions extends autoTpProfileInterestActions
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

}
