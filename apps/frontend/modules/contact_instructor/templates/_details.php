<?php $contact_instructor = $profile->getContactInstructor() ?>
<div class="content-block">    
    <h2>Physical Address</h2>
    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone work", "detail_value" => $contact_instructor->getPhoneWork())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone home", "detail_value" => $contact_instructor->getPhoneHome())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone mobile", "detail_value" => $contact_instructor->getPhoneMobile())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 1", "detail_value" => $contact_instructor->get('address_line_1'))); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 2", "detail_value" => $contact_instructor->get('address_line_2'))); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Postcode", "detail_value" => $contact_instructor->getPostcode())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "City", "detail_value" => $contact_instructor->getCity())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Country", "detail_value" => $contact_instructor->getCountry())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "State province", "detail_value" => $contact_instructor->getStateProvince())); ?>
</div>
<div class="content-block">    
    <h2>Postal Address</h2>
    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 1", "detail_value" => $contact_instructor->get('postal_address_line_1'))); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 2", "detail_value" => $contact_instructor->get('postal_address_line_2'))); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Postcode", "detail_value" => $contact_instructor->getPostalPostcode())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "City", "detail_value" => $contact_instructor->getPostalCity())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "Country", "detail_value" => $contact_instructor->getPostalCountry())); ?>

    <?php include_partial('contact/contact_detail_div', array("detail_label" => "State province", "detail_value" => $contact_instructor->getPostalStateProvince())); ?>
</div>