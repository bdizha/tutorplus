<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_bcc_emails">    
    <div class="recipient-field">
        <label for="email_message_bcc_emails">Bcc:</label>
        <div id="bcc_email_recipients">
            <?php include_partial('email_recipients', array('type' => 'bcc_email')) ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){      
        $(".choose-recipient").live("click", function(){
            var type = $(this).attr("id"); 
            var title = $(this).attr("title"); 
            var url = '/message_choose_recipients/' + type;
            openPopup(url, '623px', '480px', 'Add ' + title + ' Message Recipients');
            return false;
        });
    });
</script>