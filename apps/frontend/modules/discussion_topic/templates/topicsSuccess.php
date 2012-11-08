<?php use_helper('I18N', 'Date') ?>

<div class="sf_admin_heading">
    <h3>Discussion ~  <?php echo $discussion->getName() ?></h3>
</div> 
<div id="sf_admin_form_container">
    <div id="sf_admin_content"> 
        <?php include_partial('discussion_topic/list_header', array('discussion' => $discussion)) ?>	
        <div class="sf_admin_show">
            <?php include_partial('discussion_topic/topics', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
            <ul class="sf_admin_actions" style="clear:both">
                <li class="sf_admin_action_new">
                    <input type="button" class="button" value="+ New Topic" />
                </li>
            </ul>
        </div> 
        <?php include_partial('discussion_topic/list_footer', array('discussion' => $discussion)) ?>
    </div>
</div>