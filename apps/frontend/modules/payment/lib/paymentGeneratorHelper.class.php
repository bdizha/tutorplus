<?php

/**
 * payment module helper.
 *
 * @package    tutorplus.org
 * @subpackage payment
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paymentGeneratorHelper extends BasePaymentGeneratorHelper
{

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
            "Payments" => "payment",
            "History" => "payment",
            "Received" => "received_payment"
        )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "payments",
            "current_child" => "history",
            "current_link" => "received_payments"
        );
    }

    public function showBreadcrumbs($object) {
        return array('breadcrumbs' => array(
            "Payments" => "payment",
            "News Items" => "news",
            "News Item ~ " . $object->getHeading() => "news/" . $object->getSlug(),
        )
        );
    }

    public function showLinks() {
        return array(
            "currentParent" => "communication",
            "current_child" => "channels",
            "current_link" => "news"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
            "Payments" => "payment",
            "New Payment" => "payment/new"
        )
        );
    }

    public function newLinks() {
        return array(
            "currentParent" => "payments",
            "current_child" => "history",
            "current_link" => "received_payments"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
            "Payments" => "payment",
            "Edit Payment ~ " . $object->getStudent() => "payment/" . $object->getId() . "/edit",
        )
        );
    }

    public function editLinks() {
        return array(
            "currentParent" => "payments",
            "current_child" => "history",
            "current_link" => "received_payments"
        );
    }
}