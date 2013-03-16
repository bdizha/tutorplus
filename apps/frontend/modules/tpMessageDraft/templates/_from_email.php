<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_from_email">    
    <?php $user = $sf_user->getProfile()->getProfile() ?>
    <div>
        <label for="email_message_from_email">From:</label>
        <div class="content">
            <input type="hidden" name="email_message[from_email]" value="<?php echo $user->getEmail() ?>" id="email_message_from_email"/>
            <input type="hidden" name="email_message[reply_to]" value="<?php echo $user->getEmail() ?>" id="email_message_freply_to"/>
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $user, "dimension" => 24)) ?>
            <?php echo $user->getName() . "&nbsp;&lt;" . $user->getEmail() . "&gt;" ?>
            <input class="choose-recipient button" id="to_email" title="To" type="button" value="To"/>
            <input class="choose-recipient button" id="cc_email" title="Cc" type="button" value="Cc"/>
            <input class="choose-recipient button" id="bcc_email" title="Bcc" type="button" value="Bcc"/>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){      
        $(".choose-recipient").live("click", function(){
            var type = $(this).attr("id"); 
            var title = $(this).attr("title"); 
            var url = '/message/choose/recipients/' + type;
            openPopup(url, '623px', '480px', 'Add ' + title + ' Message Recipients');
            return false;
        });
    });
</script>