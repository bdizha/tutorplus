<div class="message_stream <?php echo $isFirst ? ' current' : '' ?>" id="message_<?php echo $email_message->getId() ?>">
    <div class="head">
        <div class="subject">
            <div class="content">
                <a href='#'><?php echo ($email_message->getSenderId() == $sf_user->getId()) ? "Me" : $email_message->getSender() ?></a>
                <span class="email_from">
                    <?php echo " &lt;" . $email_message->getFromEmails() . "&gt;:" ?>
                </span>
                <?php echo $email_message->getSubject() ?>
            </div>
        </div>
        <div class="datetime"><?php echo false !== strtotime($email_message->getCreatedAt()) ? format_date($email_message->getCreatedAt(), "f") : '&nbsp;' ?></div>
    </div>
    <div class="message_actions">
        <input type="button" id="reply_<?php echo $email_message->getId() ?>" messageid="<?php echo $email_message->getId() ?>" value="Reply" class="save reply"/>
    </div>
    <div class="body">
        <?php echo $email_message->getHtmlizedBody() ?>
    </div>
    <div class="message_reply hide" id="message_reply_<?php echo $email_message->getId() ?>">
        <form action="/backend.php/message_reply" method="post" name="message_form_[<?php echo $email_message->getId() ?>]" id="message_form_<?php echo $email_message->getId() ?>">
            <input id="email_message_id_<?php echo $email_message->getId() ?>" type="hidden" name="email_message[id]"/>
            <input id="email_message_is_reply_<?php echo $email_message->getId() ?>" type="hidden" name="email_message[is_reply]" value="1"/>
            <input id="email_message_previous_sender_id_<?php echo $email_message->getId() ?>" type="hidden" name="email_message[previous_sender_id]" value="<?php echo $previous_sender_id ?>"/>
            <input id="email_message_previous_id_<?php echo $email_message->getId() ?>" type="hidden" name="email_message[previous_id]" value="<?php echo $previous_id ?>"/>
            <input id="email_message_email_template_id_<?php echo $email_message->getId() ?>" type="hidden" name="email_message[email_template_id]" value=""/>
            <input id="email_message_from_email_<?php echo $email_message->getId() ?>" type="hidden" value="<?php echo $sf_user->getEmail() ?>" name="email_message[from_email]"/>
            <input id="email_message_sender_id_<?php echo $email_message->getId() ?>" type="hidden" value="<?php echo $sf_user->getId() ?>" name="email_message[sender_id]">
            <input id="email_message_reply_to_<?php echo $email_message->getId() ?>" type="hidden" value="<?php echo $email_message->getFromEmail() ?>" name="email_message[reply_to]"/>
            <input id="email_message_status_<?php echo $email_message->getId() ?>" type="hidden" value="2" name="email_message[status]"/>
            <ul class="sf_admin_actions">
                <li class="sf_admin_action_save"><input type="button" id="message_top_save_<?php echo $email_message->getId() ?>" value="Save draft" class="save"></li>                    
                <li class="sf_admin_action_save"><input type="button" id="message_top_send_<?php echo $email_message->getId() ?>" value="Send" class="save"></li>                    
                <li class="sf_admin_action_save"><input type="button" id="message_top_cancel_<?php echo $email_message->getId() ?>" value="Cancel" class="save"></li>                    
            </ul>
            <table class="message_table">
                <tbody>
                    <tr class="message_row">
                        <td class="first"><label for="email_message_from_email">From:</label></td>
                        <td>
                            <?php echo $sf_user->getName() ?> <<?php echo $sf_user->getEmail() ?>>
                        </td>
                    </tr>
                    <tr class="message_row">
                        <td class="first"><label for="email_message_to_email">To:</label></td>
                        <td>
                            <input id="email_message_to_email_<?php echo $email_message->getId() ?>" type="hidden" value="<?php echo $email_message->getFromEmail() ?>" name="email_message[to_email]"/>
                            <?php echo $email_message->getFromEmails() ?>
                        </td>
                    </tr>
                    <tr class="message_row">
                        <td class="first"><label for="email_message_subject_<?php echo $email_message->getId() ?>">Subject:</label></td>
                        <td><input type="text" value="<?php echo (strpos($email_message->getSubject(), "Re:") === false) ? "Re: " . $email_message->getSubject() : $email_message->getSubject() ?>" id="email_message_subject_<?php echo $email_message->getId() ?>" name="email_message[subject]"/></td>
                    </tr>
                    <tr class="message_row">
                        <td colspan="2"><textarea id="email_message_body_<?php echo $email_message->getId() ?>" name="email_message[body]" cols="30" rows="4"><?php echo $email_message->getPreviousBody() ?></textarea></td>
                    </tr>
                </tbody>
            </table>
            <ul class="sf_admin_actions">
                <li class="sf_admin_action_save"><input type="button" id="message_bottom_save_<?php echo $email_message->getId() ?>" value="Save Draft" class="save"></li>                    
                <li class="sf_admin_action_save"><input type="button" id="message_bottom_send_<?php echo $email_message->getId() ?>" value="Send" class="save"></li>                    
                <li class="sf_admin_action_save"><input type="button" id="message_bottom_cancel_<?php echo $email_message->getId() ?>" value="Cancel" class="save"></li>                    
            </ul>
        </form>
    </div>
</div>