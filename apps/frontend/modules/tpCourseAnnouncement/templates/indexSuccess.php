<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3>
        <?php include_partial('tpCourse/photo', array('course' => $course, "dimension" => 24)) ?>
        <?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
    </h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('tpCommon/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs($course, "index")) ?>
        <div class="tab-block">
            <?php if (!$courseAnnouncements->count()): ?>
                <?php echo __("There isn't any announcements made yet.", array(), 'sf_admin') ?>
            <?php else: ?>  
                <ul class="sf_admin_actions">
                    <?php include_partial('tpCourseAnnouncement/list_actions', array('helper' => $helper)) ?>
                </ul>
                <div id="announcements">
                    <?php include_partial('tpAnnouncement/list', array('announcements' => $courseAnnouncements, 'helper' => $helper)) ?>
                </div>
            <?php endif; ?>             
            <ul class="sf_admin_actions">
                <?php include_partial('tpCourseAnnouncement/list_actions', array('helper' => $helper)) ?>
            </ul>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".announcement").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
    });
</script>
