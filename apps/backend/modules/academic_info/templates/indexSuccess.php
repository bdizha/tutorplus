<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "academics", "item_level_2" => "general_info", "current_route" => "academic_info")) ?>
<?php end_slot() ?>

<div class="breadcrumb">
    <div id="current_path">
        <a id="first" href="/backend.php/course">Academics</a>
        <a href="/backend.php/academic_info"><?php echo __('General Info', array(), 'messages') ?></a>
        <a href="/backend.php/academic_info"><?php echo __('Academic Info', array(), 'messages') ?></a>
    </div>
</div>

<div class="sf_admin_heading">
    <div id="heading_c_content">
        <h3><?php echo __('Academic Info', array(), 'messages') ?></h3>
    </div>
    <div id="heading_r_content">
        <?php echo $form['academic_info_id']->render() ?>
    </div>     
</div>
<div id="sf_admin_form_container"></div>
<script type="text/javascript">
    $(document).ready(function(){		
        fetchAcademicInfo();
        $('#academic_period_academic_info_id').change(fetchAcademicInfo);
    });
	
    function fetchAcademicInfo(){
        var academic_period_id = $('#academic_period_academic_info_id').val();
        $.get('/backend_dev.php/academic_info/' + academic_period_id, showAcademicInfo);
    }
	
    function showAcademicInfo(res){
        $('#sf_admin_form_container').html(res);
    }

    function openDialog(title){		
        $("#popup").dialog({
            modal:true,
            title: title,
            autoOpen:false,
            buttons:{"Cancel":function(){
                    $(this).dialog('close');
                },
                "Save":function(){					
                    $("#form").ajaxSubmit(function(data){
                        $("#popup").html(data);
                    });
                }
            },
            position:'center',
            minHeight:200,
            width:<?php echo sfConfig::get("app_popup_academic_period_width") ?>,
            resizable:true,
            draggable:true
        });
		
        $("#popup").html('<div style="margin-right:auto; margin-left:auto; width:32px; height:32px"><img alt="Loading..." src="/images/ajax-loader.gif"/></div>');
        $("#popup").dialog("open");
    }
</script>