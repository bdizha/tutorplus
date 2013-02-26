<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div class="sf_admin_heading">
	<h3>
		<?php include_partial('course/photo', array('course' => $course, "dimension" => 24)) ?>
		<?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
	</h3>
</div>
<div id="sf_admin_content">
	<?php include_partial('common/flashes_normal') ?>
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getTabs($course, "index"))) ?>
		<div class="tab-block">
			<ul class="sf_admin_actions">
				<?php include_partial('course_announcement/list_actions', array('helper' => $helper)) ?>
			</ul>
			<div id="announcements">
				<?php include_partial('announcement/list', array('announcements' => $courseAnnouncements, 'helper' => $helper)) ?>
			</div>
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
