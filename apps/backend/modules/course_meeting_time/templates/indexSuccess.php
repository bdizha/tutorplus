<?php use_helper('I18N', 'Date') ?>

<?php include_partial('course_meeting_time/flashes') ?>
<?php include_partial('course_meeting_time/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
<ul class="sf_admin_actions">
    <?php include_partial('course_meeting_time/list_batch_actions', array('helper' => $helper)) ?>
    <?php include_partial('course_meeting_time/list_actions', array('helper' => $helper)) ?>
    <?php include_partial('course_meeting_time/list_footer', array('helper' => $helper)) ?>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){        
        $("#course_meeting_times .sf_admin_pagination li").click(function(){      
            $.get($(this).children('a').attr("href"), showCourseMeetingTimes);
            return false;
        });
        
        $("#course_meeting_times th a").click(function(){      
            $.get($(this).attr("href"), showCourseMeetingTimes);
            return false;
        });
    });
</script>