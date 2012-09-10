<?php if (!$form->getObject()->isNew()): ?>
    <div id="sf_instructor_recipients">
        <div id="instructor_recipients">
            <?php foreach ($form->getObject()->getInstructorMailingLists() as $instructorMailingList): ?>
                <div class="mailing-list-instructor" id="mailing-list-instructor-<?php echo $instructorMailingList->getInstructorId() ?>">
                    <div class="instructor-image">
                        <img alt="<?php echo $instructorMailingList->getInstructor()->getName() ?>" src="/uploads/users/6/avatar_24.png"/>
                    </div>
                    <div class="instructor-name"><?php echo $instructorMailingList->getInstructor()->getName() ?></div>
                </div> 
            <?php endforeach; ?>
        </div>
        <input class="button" type="button" id="add_instructor_recipients" value="Add instructor recipients"/>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){      
            $("#add_instructor_recipients").live("click", function(){
                var url = '/backend.php/mailing_list_choose_instructor_recipients';
                openPopup(url, '623px', '480px', 'Add instructor recipients');
                return false;
            });
        });
    </script>
<?php else: ?>
    <div class="instruction">Please click "Save" in order to proceed adding instructor recipients!</div>
<?php endif; ?>
