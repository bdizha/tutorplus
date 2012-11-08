<div class="message_stream <?php echo $isFirst ? ' current' : '' ?>" id="message">
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_from_email">    
        <label for="email_message_from_email">From:</label>
        <div class="content">
            <?php $sender = $emailMessage->getSender(); ?>
            <?php include_partial('personal_info/photo', array('user' => $sender, "dimension" => 24)) ?>
            <?php echo $sender->getName() . "&nbsp;&lt;" . $sender->getEmail() . "&gt;" ?>
        </div>
    </div>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_to_emails">    
        <div class="recipient-field">
            <label for="email_message_to_emails">To:</label>
            <div id="to_email_recipients">
                <div id="recipients_holder_to_email">
                    <?php foreach (sfGuardUserTable::getInstance()->retrieveByEmails($emailMessage->getToEmail()) as $user): ?>
                        <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 24)) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_subject">    
        <label for="email_message_subject">Subject:</label>
        <div class="content "><?php echo $emailMessage->getSubject() ?></div>
    </div>
    <div class="message-time"><?php echo myToolkit::formattedDate($emailMessage->getCreatedAt(), "f"); ?></div>
    <div class="thread">
        <?php include_partial('personal_info/photo', array('user' => $emailMessage->getSender(), "dimension" => 48)) ?>
        <div class="message">
            <div class="value"><?php echo $emailMessage->getHtmlizedBody() ?></div>
            <div class="user_meta">By <?php echo link_to($emailMessage->getSender(), 'profile_show', $emailMessage->getSender()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($emailMessage->getCreatedAt(), "f"); ?></span></div>
        </div>
    </div>
    <?php foreach ($emailMessage->getReplies() as $reply): ?>
        <?php $emailMessageReply = $reply->getEmailMessageReply() ?>
        <div class="thread">
            <?php include_partial('personal_info/photo', array('user' => $emailMessageReply->getSender(), "dimension" => 48)) ?>
            <div class="message">
                <div class="value"><?php echo $emailMessageReply->getHtmlizedBody() ?></div>
                <div class="user_meta">By <?php echo link_to($emailMessageReply->getSender(), 'profile_show', $emailMessageReply->getSender()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($emailMessageReply->getCreatedAt(), "f"); ?></span></div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="thread" id="message_reply">
        <form action="/message_reply" method="post" name="message_reply_form" id="message_reply_form">
            <input id="email_message_to_email>" type="hidden" name="email_message[to_email]" value="<?php echo $fromEmail; ?>"/>
            <input id="email_message_subject" type="hidden" name="email_message[subject]" value="Re: <?php echo $emailMessage->getSubject() ?>"/>
            <input id="email_message_is_reply" type="hidden" name="email_message[is_reply]" value="1"/>
            <input id="email_message_previous_sender_id" type="hidden" name="email_message[previous_sender_id]" value="<?php echo $previous_sender_id ?>"/>
            <input id="email_message_previous_id" type="hidden" name="email_message[previous_id]" value="<?php echo $previous_id ?>"/>
            <input id="email_message_email_template_id" type="hidden" name="email_message[email_template_id]" value=""/>
            <input id="email_message_from_email" type="hidden" value="<?php echo $sf_user->getEmail() ?>" name="email_message[from_email]"/>
            <input id="email_message_sender_id" type="hidden" value="<?php echo $sf_user->getId() ?>" name="email_message[sender_id]">
            <input id="email_message_reply_to" type="hidden" value="<?php echo $emailMessage->getFromEmail() ?>" name="email_message[reply_to]"/>
            <input id="email_message_status" type="hidden" value="<?php echo EmailMessageTable::EMAIL_MESSAGE_STATUS_SENT ?>" name="email_message[status]"/>
            <?php include_partial('personal_info/photo', array('user' => $sf_user->getGuardUser(), "dimension" => 48)) ?>
            <div class="reply">
                <textarea name="email_message[body]" id="email_message_reply_body" cols="30" rows="4"></textarea>
            </div>
        </form>
    </div>
    <div class="message_actions">
        <input type="button" id="reply" messageid="<?php echo $emailMessage->getId() ?>" value="Reply" class="save"/>
    </div>
</div>