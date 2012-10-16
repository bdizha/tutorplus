<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_cc_emails">    
    <div class="recipient-field">
        <label for="email_message_cc_emails">Cc:</label>
        <input class="choose-recipient" id="cc_email" title="Cc" type="button" value="+"/>
        <div id="cc_email_recipients">
            <?php include_partial('email_recipients', array('type' => 'cc_email')) ?>
        </div>
    </div>
</div>