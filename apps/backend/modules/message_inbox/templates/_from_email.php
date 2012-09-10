<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_from_email">    
    <div>
        <label for="email_message_from_email">From:</label>
        <div class="content">
            <input type="hidden" name="email_message[from_email]" value="<?php echo $sf_user->getEmail() ?>" id="email_message_from_email"/>
            <input type="hidden" name="email_message[reply_to]" value="<?php echo $sf_user->getEmail() ?>" id="email_message_freply_to"/>
            <?php echo $sf_user->getName() . "&nbsp;&lt;" . $sf_user->getEmail() . "&gt;" ?>
        </div>
    </div>
</div>