<?php

require_once dirname(__FILE__) . '/../lib/profile_bookGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profile_bookGeneratorHelper.class.php';

/**
 * profile_book actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_book
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_bookActions extends autoProfile_bookActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->profile = $this->getUser()->getGuardUser();
    }

}
