<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_from_email">    
    <?php $user = $sf_user->getProfile()->getUser() ?>
    <div>
        <label for="email_message_from_email">From:</label>
        <div class="content">
            <input type="hidden" name="email_message[from_email]" value="<?php echo $user->getEmail() ?>" id="email_message_from_email"/>
            <input type="hidden" name="email_message[reply_to]" value="<?php echo $user->getEmail() ?>" id="email_message_freply_to"/>
            <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 24)) ?>
            <?php echo $user->getName() . "&nbsp;&lt;" . $user->getEmail() . "&gt;" ?>
        </div>
    </div>
</div>