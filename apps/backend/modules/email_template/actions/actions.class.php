<?php

require_once dirname(__FILE__) . '/../lib/email_templateGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/email_templateGeneratorHelper.class.php';

/**
 * email_template actions.
 *
 * @package    tutorplus
 * @subpackage email_template
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class email_templateActions extends autoEmail_templateActions {

    public function executeTest(sfWebRequest $request) {
        $mailer = new tpMailer();
        $mailer->setTemplate('reset-your-tutorplus-password');
        $mailer->setToEmails("Batanayi Matuku <bdizha@gmail.com>");
        $mailer->addValues(array(
            "USER" => "Edmore Musarurwa",
            "RESET_PASSWORD_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('sf_guard_forgot_password_change', array("unique_key" => "somerandomstuffcomeshere"), 'absolute=true'),
                'route' => "@sf_guard_forgot_password_change?unique_key=somerandomstuffcomeshere")
                )));

        $mailer->render();

        // send the asker the doctors response
        $this->getUser()->setFlash('notice', 'Thanks for submitting your question. Please note that you will be automatically sent an email once our experts have answered your question :)');
    }

}
