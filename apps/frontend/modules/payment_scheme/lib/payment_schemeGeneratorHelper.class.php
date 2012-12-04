<?php

/**
 * payment_scheme module helper.
 *
 * @package    tutorplus.org
 * @subpackage payment_scheme
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class payment_schemeGeneratorHelper extends BasePayment_schemeGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Payments" => "payment",
                "Plans" => "payment_scheme",
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "payments",
            "current_child" => "plans",
            "current_link" => "payment_scheme"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Payments" => "payment",
                "Plans" => "payment_scheme",
                "New Payment scheme" => "payment/scheme/new"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "payments",
            "current_child" => "plans",
            "current_link" => "payment_scheme"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Payments" => "payment",
                "Plans" => "payment_scheme",
                "Edit Payment Scheme ~ " . $object->getStudent() => "payment/scheme/" . $object->getId() . "/edit",
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "payments",
            "current_child" => "plans",
            "current_link" => "payment_scheme"
        );
    }

}