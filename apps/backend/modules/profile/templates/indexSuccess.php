<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->aboutLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->aboutBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3><?php echo __('Batanayi Matuku', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div class="left-block">        
            <h2>About Me</h2>
            <div class="profile-row odd-background" style="height: 134px">
                <div class="profile-column">    
                    <div class="content">I love reading anything I find in my hands as well as playing pool and foolsbal games.</div>
                </div>
            </div>
        </div>    
        <div class="right-block">      
            <h2>Academic Info</h2>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    <label>Current study:</label>
                    <div class="content">Masters of Education</div>
                </div>
            </div>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    <label>Department:</label>
                    <div class="content">Education</div>
                </div>
            </div>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    <label>Institution:</label>
                    <div class="content">UCT</div>
                </div>
            </div>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    <label>Qualification:</label>
                    <div class="content">Phd in Information Systems (Harvard college, 2007)</div>
                </div>
            </div>
        </div>
        <br style="clear:both"/>
    </div>
    <div class="content-block">
        <div class="full-block">        
            <h2>Publications</h2>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    <div class="content">Collective intentionality in CSCL environments - 2013</div>
                </div>
            </div>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    <div class="content">Adoption of Health 2.0 in South Africa - 2012</div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-block">
        <div class="left-block">        
            <h2>Books Read</h2>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    Philosophy of Money by <span class="author">George Simmel</span>
                </div>
            </div>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    Philosophy of Money by <span class="author">George Simmel</span>
                </div>
            </div>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    Pride and Prejudice by <span class="author">Jane Austine</span>
                </div>
            </div>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    A turning screw <span class="author">Henry James</span>
                </div>
            </div>
        </div>    
        <div class="right-block">        
            <h2>Interests</h2>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    <div class="content">Playing pool and foolsbal games</div>
                </div>
            </div>
            <div class="profile-row odd-background">
                <div class="profile-column">    
                    <div class="content">Reading novels</div>
                </div>
            </div>
        </div>
        <br style="clear:both"/>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){        
        
    });

    function fetchUpcommingEvents(){
        $.get('/backend.php/course_meeting_time/meetingTimes', showUpcommingEvents);
    }
    //]]
</script>