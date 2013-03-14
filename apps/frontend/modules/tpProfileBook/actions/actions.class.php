<?php

require_once dirname(__FILE__) . '/../lib/tpProfileBookGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProfileBookGeneratorHelper.class.php';
/**
 * tpProfileBook actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileBook
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileBookActions extends autoTpProfileBookActions
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
