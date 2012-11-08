<?php if (!$form->getObject()->isNew()): ?>
    <div id="sf_student_recipients">
        <div id="student_recipients">
            <?php foreach ($form->getObject()->getStudentMailingLists() as $studentMailingList): ?>
                <div class="mailing-list-student" id="mailing-list-student-<?php echo $studentMailingList->getStudentId() ?>">
                    <div class="student-image">
                        <img alt="<?php echo $studentMailingList->getStudent()->getName() ?>" src="/uploads/users/6/avatar_24.png"/>
                    </div>
                    <div class="student-name"><?php echo $studentMailingList->getStudent()->getName() ?></div>
                </div> 
            <?php endforeach; ?>
        </div>
        <input class="button" type="button" id="add_student_recipients" value="Add student recipients"/>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){      
            $("#add_student_recipients").live("click", function(){
                var url = '/mailing_list_choose_student_recipients';
                openPopup(url, '623px', '480px', 'Add student recipients');
                return false;
            });
        });
    </script>
<?php else: ?>
    <div class="instruction">Please click "Save" in order to proceed adding student recipients!</div>
<?php endif; ?>
