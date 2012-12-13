<?php use_helper('I18N', 'Date') ?>
<?php include_partial('document/assets') ?>

<?php include_partial('document/flashes') ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Documents', array(), 'messages') ?></h3>
</div>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical', array("item_level_1" => "document", "item_level_2" => "my_document", "current_route" => "file_system")) ?>
<?php end_slot() ?>

<div id="sf_admin_content">  
    <div id="sf_admin_documents">
        <?php include_partial('folders', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    </div>
</div>


<script type='text/javascript'>
    $(document).ready(function(){    
    
        $("#browser").load("/file_system?directory=Users");
        $("#document_actual_content").load("/directory_descendants?parent_id=3");
        $("#edit_form").load("/document/new");
    
        $("span.directory, .current_directory span").live('click', function(){
            $("#document_actual_content").load("/directory_descendants?parent_id=" + $(this).prev().html());
            $("#document_parent_id").val($(this).prev().html());
        });
    
        $("input#create_directory")
        .css('cursor', "hand")
        .css('cursor', "pointer")
        .click(inline_editing_add);

        function inline_editing_add(){
            $("#new_directory_holder").show();        
            $('#directory_name')
            .focus()
            .blur(inline_editing_save)
            .keypress(inline_editing_key_pressed);
        }
	
        function inline_editing_save(){
            var p;
            p = this.parentNode;
            if(p.originalHTML == this.value)
            {
                return inline_editing_restore(p);
            }
		
            $("#document_name").val(this.value);

            $("#form").ajaxSubmit(function(data){
                alert(data);
                //$("#edit_form").html(data);
                inline_editing_callback(data, p);
            });
        }
	
        function inline_editing_key_pressed(e){
            if(!e.which)inline_editing_restore(this.parentNode);
        }
	
        function inline_editing_restore(el){
            $(el).empty().text(el.originalHTML);
            $(el).attr("in_edit", false);
        }
	
        function inline_editing_callback(data, el){
            $(el).empty().text($("#document_name").val());
            $(el).attr("in_edit", false);
        }		

        function list_filter_submit(){
            $("#document_filters_parent_id").val($(this).attr("parent_id"));
            $("#form_filter").submit();
        }
    
        function inline_editing_edit(){
            if(this.in_edit)return;
            this.in_edit = true;
            var str = $(this).text().trim();
            this.originalHTML = str;
            $(this).empty();
            $('<input>')
            .attr('value', str)
            .blur(inline_editing_save)
            .keypress(inline_editing_key_pressed)
            .css('width', 400)
            .css('height', 10)
            .css('font-size', "11px")
            .css('border-color', "#3F7CB6")
            .appendTo(this)
            .focus();
        }
	
        function openDialog(title){		
            $("#popup").dialog({
                modal:true,
                title: title,
                autoOpen:false,
                buttons:{"Cancel":function(){
                        $(this).dialog('destroy');
                    },
                    "Save":function(){				
                        $("#form").ajaxSubmit(function(data){
                            alert(data);
                            $("#popup").html(data);
                        });
                    }
                },
                position:'center',
                minHeight:150,
                width:<?php echo sfConfig::get("app_popup_document_width") ?>,
                resizable:true,
                draggable:true
            });
		
            $("#popup").html('<div style="margin-right:auto; margin-left:auto; width:32px; height:32px"><img alt="Loading..." src="/images/ajax-loader.gif"/></div>');
            $("#popup").dialog("open");
        }
    });
</script>
<div id="edit_form" style="display:none"></div>
<div id="popup">&nbsp;</div>