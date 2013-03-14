<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "gradebook")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ "  . $course->getCode() => "course/" . $course->getId(), "Gradebook" => "gradebook"))) ?>
<?php end_slot() ?>

<script type="text/javascript">
    $(document).ready(function(){	
        fetchGradebookScale();
        fetchGradebookItems();
    });
		
    function fetchGradebookScale(){
        $.get('/gradebook_scale', showGradebookScale);
    }
		
    function fetchGradebookItems(){
        $.get('/gradebook_item', showGradebookItems);
    }		
		
    function showGradebookScale(res){
        $('#gradebook_scale').html(res);
    }		
		
    function showGradebookItems(res){
        $('#gradebook_items').html(res);
    }
</script>
<div class="sf_admin_heading">
    <h3><?php echo __('Gradebook', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">  
    <div id="sf_admin_content">
        <div class="content-block">
            <div id="gradebook_grades" class="sf_admin_show">
                <h2>Course Grades</h2>
                <div id="gradebook_form_holder"></div>
            </div>
        </div>
        <div class="content-block">
            <div class="left-block">           
                <h2>Gradebook Scale</h2>
                <div id="gradebook_scale" class="sf_admin_show"></div>                
            </div>
            <div class="right-block">                
                <h2>Gradebook Items</h2>
                <div id="gradebook_items" class="sf_admin_show"></div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="gradebook_id" name="gradebook[id]" value="<?php echo $gradebook->getId() ?>" />
<script type="text/javascript">
    $(document).ready(function(){			
        fetchGradebookGrades();
        fetchGradebookScale();
        fetchGradebookItems();
    });
		
    function fetchGradebookGrades(){
        $('#gradebook_form_holder').html(loadingHtml);
        $.get('/gradebook/grades', showGradebookGrades);
    }
		
    function fetchGradebookScale(){
        $('#gradebook_scale').html(loadingHtml);        
        $.get('/gradebook_scale', showGradebookScale);
    }
		
    function fetchGradebookItems(){
        $('#gradebook_items').html(loadingHtml);
        $.get('/gradebook_item', showGradebookItems);
    }		
		
    function showGradebookGrades(res){
        $('#gradebook_grades').html(res);
    }			
		
    function showGradebookScale(res){
        $('#gradebook_scale').html(res);
    }		
		
    function showGradebookItems(res){
        $('#gradebook_items').html(res);
    }
</script>