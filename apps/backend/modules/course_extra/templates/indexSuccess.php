<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "academics", "Course ~ "  . $course->getCode() => "course/" . $course->getId(), "Course Extras" => "course_extra"))) ?>
<?php end_slot() ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics2", "item_level_2" => "course_home", "current_route" => "course_extra")) ?>

<script type="text/javascript">
    $(document).ready(function(){
        
        resizeWidths();
        fetchCourseLinks();
        fetchReadingItems();
        
        $("#add_course_link").click(function(){
            myModal("Add Course External Link", $(this).attr("href"), 148, 510);
            return false;
        }); 
        
        $("#add_course_reading_items").click(function(){
            myModal("Add Course Reading Item", $(this).attr("href"), 160, 510);
            return false;
        });
    });

    function fetchCourseLinks(){
        $.get('/backend.php/course_link/links', showCourseLinks);
    }

    function fetchReadingItems(){
        $.get('/backend.php/course_reading_item/readingItems', showReadingItems);
    }

    function showCourseLinks(res){
        $('#course_links').html(res);
    }

    function showReadingItems(res){
        $('#course_reading_items').html(res);
    }
</script>
<?php end_slot() ?>
<div class="sf_admin_heading">
    <h3>Course Extras</h3>
</div>
<div id="sf_admin_form_container">
    <div class="content-block">
        <div class="left-block">
            <h2>External Links <span class="actions"><a id="add_course_link" href="/backend.php/course_link/new">Add</a></span></h2>
            <div id="course_links"></div>
        </div>
        <div class="right-block">
            <h2>Reading Items <span class="actions"><a id="add_course_reading_items" href="/backend.php/course_reading_item/new">Add</a></span></h2>
            <div id="course_reading_items"></div>
        </div>
        <div class="clear"/>
    </div>
</div>