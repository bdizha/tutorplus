<?php use_helper('I18N', 'Date') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Edit Instructor: %%first_name%% %%last_name%%', array('%%first_name%%' => $instructor->getFirstName(), '%%last_name%%' => $instructor->getLastName()), 'messages') ?></h3>
</div>

<?php include_partial('heading_tabs', array('current' => "academic")) ?>

<div id="sf_admin_form_container">
    <?php include_partial('instructor/flashes', array('form' => $form)) ?>

    <div id="sf_admin_header">
        <?php include_partial('instructor/form_header', array('instructor' => $instructor, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>

    <div id="sf_admin_content">
        <div class="sf_admin_form">
            <fieldset id="sf_fieldset_academic_details">
                <?php echo form_tag_for($form, '@instructor_academic_details', array('id' => 'form')) ?>
                <?php echo $form->renderHiddenFields(false) ?>

                <?php if ($form->hasGlobalErrors()): ?>
                    <?php echo $form->renderGlobalErrors() ?>
                <?php endif; ?>
                
                <h2>Courses <span class="actions"><a id="edit_instructor_courses" href="/backend_dev.php/courses_instructor">Edit</a></span></h2>
                <div id="courses_list"></div>
                
                <h2>Mailing Lists <span class="actions"><a id="edit_instructor_mailing_lists" href="/backend.php/mailing_lists_instructor">Edit</a></span></h2>
                <div id="mailing_lists_list"></div>
                </form>
            </fieldset>
        </div>
    </div>
    <div id="sf_admin_footer">
        <ul class="sf_admin_actions">
            <li class="sf_admin_action_cancel">
                <a href="/backend.php/instructor/4/List_cancel">Cancel</a>
            </li>
            <li class="sf_admin_action_save">
                <input type="button" value="Save" class="save">
            </li>                                                
            <li class="sf_admin_action_done">                
                <a href="/backend.php/instructor/4/List_done">Done</a>        
            </li>
        </ul>
    </div>
</div> 

<script type='text/javascript'>
    $(document).ready(function(){ 
        
        // load the courses list
        $("#courses_list").load("/backend.php/instructor_courses");
        
        // load the mailing lists list
        $("#mailing_lists_list").load("/backend.php/instructor_mailing_lists");
        
        $("#edit_instructor_programmes").click(function(){
            myModal("Edit Instructor Programmes", $(this).attr("href"), 300, 510);
            return false;
        });	
        
        $("#edit_instructor_courses").click(function(){
            myModal("Edit Instructor Courses", $(this).attr("href"), 300, 510);
            return false;
        });
        
        $("#edit_instructor_mailing_lists").click(function(){
            myModal("Edit Instructor Mailing Lists", $(this).attr("href"), 300, 510);
            return false;
        });
    
        $("#tab_edit_instructor").click(function(){
            $("#sf_admin_container").load("instructor/<?php echo $instructor->getId() ?>/edit");
            return false;
        });

        $("#tab_edit_academic_details").click(function(){
            $("#sf_admin_container").load("instructor_academic_details/<?php echo $instructor->getId() ?>/edit");
            return false;
        });        

        $("#tab_edit_contact_details").click(function(){
<?php if ($sf_user->getMyAttribute('contact_instructor_show_id', null)): ?>
                $("#sf_admin_container").load("instructor_contact_details/<?php echo $sf_user->getMyAttribute('contact_instructor_show_id', null) ?>/edit");
<?php else: ?>
                $("#sf_admin_container").load("instructor_contact_details/new");
<?php endif; ?>
            return false;
        });
    });
</script>