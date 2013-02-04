<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">            
            <div class="sf_admin_form">
                <div id="choose_course_instructors_form_holder">
                    <form id="choose_course_instructors_form" action="<?php echo url_for("@choose_course_instructors") ?>" method="post">
                        <fieldset id="sf_fieldset_none">
                            <?php foreach ($instructorPeers as $peer): ?>
                                <?php $instructor = ($peer->getInviterId() == $sf_user->getId()) ? $peer->getInvitee() : $peer->getInviter() ?>
                                <div class="peer">
                                    <input type="checkbox" class="input-checkbox" name="instructor[]" value="<?php echo $instructor->getId() ?>" <?php echo (isset($currentInstructorIds) && is_array($currentInstructorIds) && in_array($instructor["id"], $currentInstructorIds)) ? "checked='checked'" : "" ?> id="instructor_<?php echo $instructor->getId() ?>"/>
                                    <div class="description">
                                        <?php include_partial('personal_info/photo', array('profile' => $instructor, "dimension" => 36)) ?>
                                        <div class="name"><?php echo $instructor ?></div>
                                        <div class="institution"><?php echo $instructor->getInstitution() ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cboxLoadedActions">
    <?php include_partial('course_peer/form_actions') ?>    
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_add_recipients .save").click(function(){
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);

            $("#choose_course_instructors_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);

                // fetch course instructors
                fetchCourseInstructors();
            });
            return false;
        });

        $(".cancel, .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
    });
</script>