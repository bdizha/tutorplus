<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->findLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->findBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3>Find Peers</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div class="peer-block plain-row padding-10" id="my_peers">  
            <?php foreach ($peers as $key => $peer): ?>
                <?php $name = $peer["first_name"] . " " . $peer["last_name"] ?>
                <div class="peer"> 
                    <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="<?php echo $name ?>" src="/avatars/36.png"></a>
                    <div class="name"><?php echo $name ?></div>
                    <div class="peer-actions">
                        <input type="button" class="peer-open" inviteeid="<?php echo $peer["id"] ?>" value="+ Request">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".peer-open").live("click", function(){
            var inviteeId = $(this).attr("inviteeid");
            $(this).addClass("peer-invited");
            $(this).removeClass("peer-open");
            $(this).attr("value", "? Invited");
            $.get('/backend.php/peer_invite/' + inviteeId, {}, function(response){   
                if(response == "success"){
                }
            }, 'html'); 
        });
    });
    //]]
</script>