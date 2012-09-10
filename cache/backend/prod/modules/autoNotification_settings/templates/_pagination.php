<div class="sf_admin_pagination">
	<ul>
		<li class="pager-first">
		  <a href="<?php echo url_for('@notification_settings') ?>?page=1">
		    « first
		  </a>		
		</li>
		<li class="pager-previous">		
		  <a href="<?php echo url_for('@notification_settings') ?>?page=<?php echo $pager->getPreviousPage() ?>">
		    ‹ previous
		  </a>
		</li>
		
	  <?php foreach ($pager->getLinks() as $page): ?>
	    <?php if ($page == $pager->getPage()): ?>
	    	<li class="pager-current">
	      	<?php echo $page ?>
	      </li>
	    <?php else: ?>
	    	<li class="pager-link">
	      	<a href="<?php echo url_for('@notification_settings') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
	    	</li>
	    <?php endif; ?>
	  <?php endforeach; ?>
	
		<li class="pager-next">
		  <a href="<?php echo url_for('@notification_settings') ?>?page=<?php echo $pager->getNextPage() ?>">
		    next ›
		  </a>
		 </li>
		 
		<li class="pager-last">
		  <a href="<?php echo url_for('@notification_settings') ?>?page=<?php echo $pager->getLastPage() ?>">
		    last »
		  </a>
		</li>
</div>