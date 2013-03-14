<?php

require_once dirname(__FILE__) . '/../lib/tpProfileBiographyGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProfileBiographyGeneratorHelper.class.php';
/**
 * tpProfileBiography actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileBiography
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileBiographyActions extends autoTpProfileBiographyActions
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
