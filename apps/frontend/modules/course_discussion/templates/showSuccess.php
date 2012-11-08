<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs($discussion)) ?>
<?php end_slot() ?>

<script type="text/javascript">
    $(document).ready(function(){			
        fetchContent('/discussion_topic');
    });
</script>