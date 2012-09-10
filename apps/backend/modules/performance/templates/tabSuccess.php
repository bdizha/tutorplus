<div class="sf_admin_show">
    <div class="content">
        <h2>Registration Details</h2>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">  
            <div>
                <label for="course_name">Registration number</label>
                <div class="content ">
                    <?php echo $student->getNumber() ?>
                </div>
            </div>
        </div>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">  
            <div>
                <label for="course_name">Student name</label>
                <div class="content ">
                    <?php echo $student->getName() ?>
                </div>
            </div>
        </div>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
            <div>
                <label for="course_name">Program</label>
                <div class="content ">
			      	Bsc Computer Science
                </div>
            </div>
        </div>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
            <div>
                <label for="course_name">Enrollment</label>
            </div>
            <div class="content ">
                <?php echo $student->getEnrollment() ?>
            </div>
        </div>
    </div>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
        <div>
            <label for="course_name">Term</label>
            <div class="content ">
                Spring 2007-2008
            </div>
        </div>
    </div>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
        <div>
            <label for="course_name">Applied</label>
            <div class="content ">
                N/A			      	
            </div>
        </div>
    </div>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
        <div>
            <label for="course_name">Status</label>
            <div class="content ">
                <?php echo $student->getDisplayStatus() ?>
            </div>
        </div>
    </div>
</div>