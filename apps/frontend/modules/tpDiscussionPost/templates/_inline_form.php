<div class="sf_admin_form">
    <?php echo form_tag_for($form, '@discussion_post', array('id' => 'discussion_post_form_' . $discussionPost->getId())) ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_message">    
        <div class="content ">
            <div class="input"><?php echo $form["message"] ?></div>
        </div>
    </div>
    <div class="discussion_topic_actions">
        <input type="button" class="save update" id="<?php echo $discussionPost->getId() ?>" value="Update" />
    </div>
</form>
</div>