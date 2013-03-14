<?php use_helper('I18N', 'Date') ?>
<?php include_partial('assignment_submission/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
<script type='text/javascript'>
    $(document).ready(function(){        
        $("#assignment_submissions .sf_admin_pagination li").click(function(){      
            $.get($(this).children('a').attr("href"), showAssignmentSubmissions);
            return false;
        });
        
        $("#assignment_submissions th a").click(function(){      
            $.get($(this).attr("href"), showAssignmentSubmissions);
            return false;
        });
    });
</script>