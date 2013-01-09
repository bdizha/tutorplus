<?php

/**
 * faq module helper.
 *
 * @package    tutorplus.org
 * @subpackage faq
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqGeneratorHelper extends BaseFaqGeneratorHelper
{
    
    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Faqs" => "faq"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "faqs"
        );
    }    
}