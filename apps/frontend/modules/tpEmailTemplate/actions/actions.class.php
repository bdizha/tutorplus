<?php

require_once dirname(__FILE__) . '/../lib/tpEmailTemplateGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpEmailTemplateGeneratorHelper.class.php';

/**
 * tpEmailTemplate actions.
 *
 * @package    tutorplus
 * @subpackage tpEmailTemplate
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpEmailTemplateActions extends autoTpEmailTemplateActions {

    public function executeTest(sfWebRequest $request) {
        $mailer = new tpMailer();
        $mailer->setTemplate('reset-your-tutorplus-password');
        $mailer->setToEmails("Batanayi Matuku <bdizha@gmail.com>");
        $mailer->addValues(array(
            "USER" => "Edmore Musarurwa",
            "RESET_PASSWORD_LINK" => $this->getPartial('tpEmailTemplate/link', array(
                'title' => $this->generateUrl('sf_guard_forgot_password_change', array("unique_key" => "somerandomstuffcomeshere"), 'absolute=true'),
                'route' => "@sf_guard_forgot_password_change?unique_key=somerandomstuffcomeshere")
                )));

        $mailer->render();
    }

}
