<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
<?php else: ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
<?php endif; ?>
</ul>
<script type='text/javascript'>
$(document).ready(function(){	
	$('html, body').animate({scrollTop: '0px'}, 500);

	$('.save').click(function(){		
		$("#form").ajaxSubmit(function(data){
			$("#tab_content").html(data);
		}); 	
	});
});
</script>