<?php

require_once dirname(__FILE__) . '/../lib/tpProfilePublicationGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProfilePublicationGeneratorHelper.class.php';
/**
 * tpProfilePublication actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProfilePublication
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfilePublicationActions extends autoTpProfilePublicationActions
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
