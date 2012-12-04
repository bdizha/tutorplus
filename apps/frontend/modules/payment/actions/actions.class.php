<?php

require_once dirname(__FILE__).'/../lib/paymentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/paymentGeneratorHelper.class.php';

/**
 * payment actions.
 *
 * @package    tutorplus.org
 * @subpackage payment
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paymentActions extends autoPaymentActions
{
    public function executeReceived(sfWebRequest $request) {
        // received payments
    }

    public function executeOutstanding(sfWebRequest $request) {
       // outstanding payments
    }
}
