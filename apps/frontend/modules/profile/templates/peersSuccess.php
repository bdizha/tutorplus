<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->peersLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->peersBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <div class="peer-filters">
            <ul class="nav-tabs">
                <li class="active-tab">
                    <a href="#" tab="student_peers" class="tab-title">Student Peers</a>
                    <span class="list-count"><?php echo count($studentPeers) ?></span>
                </li>
                <li>
                    <a href="#" tab="instructor_peers" class="tab-title">Instructor Peers</a>
                    <span class="list-count"><?php echo count($instructorPeers) ?></span>
                </li> 
                <li>
                    <a href="#" tab="find_peers" class="tab-title">Find Peers</a>
                </li>
            </ul>
        </div>
        <div class="peer-block plain-row padding-10">
            <div id="student_peers" class="peers">
                <?php include_partial('peer/list', array("peers" => $studentPeers)) ?>
            </div>
            <div id="instructor_peers" class="peers hide">
                <?php include_partial('peer/list', array("peers" => $instructorPeers)) ?>
            </div>
            <div id="find_peers" class="peers hide">
                <?php include_partial('peer/list', array("peers" => $potentialPeers, "isFinding" => true)) ?>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){   
        $(".nav-tabs a").click(function(){
            $(".nav-tabs li").removeClass("active-tab");
            $(this).parent().addClass("active-tab");
            
            $(".peers").removeClass("hide");            
            $(".peers").addClass("hide");
            $("#" + $(this).attr("tab")).removeClass("hide");
        });
    });
    //]]
</script>