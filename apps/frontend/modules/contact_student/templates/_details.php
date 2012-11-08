<?php $student_contact = $profile->getContactStudent() ?>
<div class="content-block">    
    <div class="left-block">
        <h2>Physical Address <span class="actions"><a href="/contact_student_edit/physical_address" id="edit_physical_address">Edit</a></span></h2>
        <div id="physical_address_container">
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone work", "detail_value" => $student_contact->getPhoneWork())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone home", "detail_value" => $student_contact->getPhoneHome())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone mobile", "detail_value" => $student_contact->getPhoneMobile())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 1", "detail_value" => $student_contact->get('address_line_1'))); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 2", "detail_value" => $student_contact->get('address_line_2'))); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Postcode", "detail_value" => $student_contact->getPostcode())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "City", "detail_value" => $student_contact->getCity())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Country", "detail_value" => $student_contact->getCountry())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "State province", "detail_value" => $student_contact->getStateProvince())); ?>
        </div>
    </div>
    <div class="right-block">    
        <h2>Postal Address <span class="actions"><a href="/contact_student_edit/postal_address" id="edit_postal_address">Edit</a></span></h2>
        <div id="postal_address_container">
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 1", "detail_value" => $student_contact->get('postal_address_line_1'))); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 2", "detail_value" => $student_contact->get('postal_address_line_2'))); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Postcode", "detail_value" => $student_contact->getPostalPostcode())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "City", "detail_value" => $student_contact->getPostalCity())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "Country", "detail_value" => $student_contact->getPostalCountry())); ?>
            <?php include_partial('contact/contact_detail_div', array("detail_label" => "State province", "detail_value" => $student_contact->getPostalStateProvince())); ?>
        </div>
    </div>
    <div class="content-block">    
        <h2>Guardian Address <span class="actions"><a href="/contact_student_edit/guardian_details" id="edit_guardian_details">Edit</a></span></h2>
        <div id="guardian_details_container">
            <div class="left-block">
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "First name", "detail_value" => $student_contact->getGuardianFirstName())); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Last name", "detail_value" => $student_contact->getGuardianLastName())); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Email address", "detail_value" => $student_contact->getGuardianEmailAddress())); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone work", "detail_value" => $student_contact->getGuardianPhoneWork())); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone home", "detail_value" => $student_contact->getGuardianPhoneHome())); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Phone mobile", "detail_value" => $student_contact->getGuardianPhoneMobile())); ?>
            </div>
            <div class="right-block">
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 1", "detail_value" => $student_contact->get('guardian_address_line_1'))); ?>  
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Address line 2", "detail_value" => $student_contact->get('guardian_address_line_2'))); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Postcode", "detail_value" => $student_contact->getGuardianPostcode())); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "City", "detail_value" => $student_contact->getGuardianCity())); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "Country", "detail_value" => $student_contact->getGuardianCountry())); ?>
                <?php include_partial('contact/contact_detail_div', array("detail_label" => "State province", "detail_value" => $student_contact->getGuardianStateProvince())); ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
    $("#edit_physical_address").click(function(){
        myModal("Edit Physical Address", $(this).attr("href"), 300, 510);
        return false;
    });
    
    $("#edit_postal_address").click(function(){
        myModal("Edit Postal Address", $(this).attr("href"), 300, 510);
        return false;
    });
    
    $("#edit_guardian_details").click(function(){
        myModal("Edit Guardian Address", $(this).attr("href"), 300, 510);
        return false;
    });
</script>