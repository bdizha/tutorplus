<?php

require_once dirname(__FILE__) . '/../lib/profile_publicationGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profile_publicationGeneratorHelper.class.php';

/**
 * profile_publication actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_publication
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_publicationActions extends autoProfile_publicationActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->profile = $this->getUser()->getGuardUser();
    }

}
