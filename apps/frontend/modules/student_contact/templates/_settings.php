<?php $studentContact = $sf_user->getProfile()->getStudentContact() ?>
<div class="content-block">
    <h2>Physical Contact Details<span class="actions student_contact_inline_edit"><a href="/student_contact_inline/edit/physical_address" title="Edit Physical Address">Edit</a></span></h2>
    <div class="full-block no-padding">
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Phone work", "fieldValue" => $studentContact->getPhoneWork())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Phone home", "fieldValue" => $studentContact->getPhoneHome())); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Phone mobile", "fieldValue" => $studentContact->getPhoneMobile())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Address line 1", "fieldValue" => $studentContact->get('address_line_1'))); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Address line 2", "fieldValue" => $studentContact->get('address_line_2'))); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Postcode", "fieldValue" => $studentContact->getPostcode())); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "City", "fieldValue" => $studentContact->getCity())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Country", "fieldValue" => $studentContact->getCountry())); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "State province", "fieldValue" => $studentContact->getStateProvince())); ?>
            </div>
            <div class="profile-column">
            </div>
        </div>
    </div>
</div>
<div class="content-block">
    <h2>Postal Contact Details <span class="actions student_contact_inline_edit"><a href="/student_contact_inline/edit/postal_address" title="Edit Postal Address">Edit</a></span></h2>
    <div class="full-block no-padding">
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Address line 1", "fieldValue" => $studentContact->get('postal_address_line_1'))); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Address line 2", "fieldValue" => $studentContact->get('postal_address_line_2'))); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Postcode", "fieldValue" => $studentContact->getPostalPostcode())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "City", "fieldValue" => $studentContact->getPostalCity())); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Country", "fieldValue" => $studentContact->getPostalCountry())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "State province", "fieldValue" => $studentContact->getPostalStateProvince())); ?>
            </div>
        </div>
    </div>
</div>
<div class="content-block">
    <h2>Guardian Contact Details <span class="actions student_contact_inline_edit"><a href="/student_contact_inline/edit/guardian_details" title="Edit Guardian Address">Edit</a></span></h2>
    <div class="full-block no-padding">
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "First name", "fieldValue" => $studentContact->getGuardianFirstName())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Last name", "fieldValue" => $studentContact->getGuardianLastName())); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Email address", "fieldValue" => $studentContact->getGuardianEmailAddress())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Phone work", "fieldValue" => $studentContact->getGuardianPhoneWork())); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Phone home", "fieldValue" => $studentContact->getGuardianPhoneHome())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Phone mobile", "fieldValue" => $studentContact->getGuardianPhoneMobile())); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Address line 1", "fieldValue" => $studentContact->get('guardian_address_line_1'))); ?>  
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Address line 2", "fieldValue" => $studentContact->get('guardian_address_line_2'))); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Postcode", "fieldValue" => $studentContact->getGuardianPostcode())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "City", "fieldValue" => $studentContact->getGuardianCity())); ?>
            </div>
        </div>
        <div class="profile-row odd-background">
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "Country", "fieldValue" => $studentContact->getGuardianCountry())); ?>
            </div>
            <div class="profile-column">    
                <?php include_partial('contact/field', array("fieldLabel" => "State province", "fieldValue" => $studentContact->getGuardianStateProvince())); ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
    $(".student_contact_inline_edit a").click(function(){
        openPopup($(this).attr("href"), "772px", "600px", $(this).attr('title'));
        return false;
    });
</script>