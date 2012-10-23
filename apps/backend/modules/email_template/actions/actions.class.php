<?php

require_once dirname(__FILE__) . '/../lib/email_templateGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/email_templateGeneratorHelper.class.php';

/**
 * email_template actions.
 *
 * @package    ecollegeplus
 * @subpackage email_template
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class email_templateActions extends autoEmail_templateActions {

    public function executeTest(sfWebRequest $request) {
        $mailer = new tpMailer();
        $mailer->setTemplate('reset-password');
        $mailer->setToEmails("Batanayi Matuku <bdizha@gmail.com>");
        $mailer->addValues(array(
            "USER" => "Edmore Musarurwa"
        ));
        
        $mailer->render();

        // send the asker the doctors response
        $this->getUser()->setFlash('notice', 'Thanks for submitting your question. Please note that you will be automatically sent an email once our experts have answered your question :)');
    }

}
