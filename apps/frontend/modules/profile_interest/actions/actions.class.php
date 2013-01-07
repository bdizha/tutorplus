<?php

require_once dirname(__FILE__) . '/../lib/profile_interestGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profile_interestGeneratorHelper.class.php';

/**
 * profile_interest actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_interest
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_interestActions extends autoProfile_interestActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->profile = $this->getUser()->getProfile();
    }

}
