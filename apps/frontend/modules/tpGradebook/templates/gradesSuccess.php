<?php use_helper('I18N', 'Date') ?>
<?php include_partial('gradebook/flashes_normal', array('form' => $form)) ?>           
<h2>Course Grades</h2>
<div id="gradebook_form_holder">
    <div class="sf_admin_list">
        <?php echo form_tag_for($form, '@gradebook', array('id' => 'gradebook_form')) ?>
        <?php echo $form->renderHiddenFields(false) ?>
        <table cellspacing="1">
            <thead>
                <tr>
                    <th class="sf_admin_text">Student</th>
                    <?php foreach ($gradebook->getGradebookItems() as $gradebookItem): ?>
                        <th class="sf_admin_text"><?php echo $gradebookItem->getName() ?> (<?php echo $gradebookItem->getWeight() ?>%)</th>
                    <?php endforeach; ?>
                    <th class="sf_admin_text">Final Grade (100%)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="<?php echo count($gradebook->getGradebookItems()) + 2 ?>"><?php echo $gradebook->getCourse()->getCourseStudents()->count() ?> results</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach ($gradebook->getCourse()->getCourseStudents() as $courseStudent): ?>
                    <tr class="sf_admin_row even">
                        <td class="sf_admin_text">
                            <a href="/profile"><?php echo $courseStudent->getStudent() ?></a>
                        </td>
                        <?php foreach ($gradebook->getGradebookItems() as $gradebookItem): ?>
                            <td class="sf_admin_text ">
                                <input class="grade" id="gradebook_grades_<?php echo $i ?>_points" type="text" value="<?php echo $courseStudent->getStudent()->getStudentGradebookItem($gradebookItem->getId())->getPoints() ?>" name="gradebook[grades][<?php echo $i ?>][points]">&nbsp;(%)
                                <input id="gradebook_grades_<?php echo $i ?>_student_id" type="hidden" value="<?php echo $courseStudent->getStudent()->getId() ?>" name="gradebook[grades][<?php echo $i ?>][student_id]">
                                <input id="gradebook_grades_<?php echo $i ?>_gradebook_item_id" type="hidden" value="<?php echo $gradebookItem->getId() ?>" name="gradebook[grades][<?php echo $i ?>][gradebook_item_id]">
                                <input id="gradebook_grades_<?php echo $i ?>_id" type="hidden" value="<?php echo $courseStudent->getStudent()->getStudentGradebookItem($gradebookItem->getId())->getId() ?>" name="gradebook[grades][<?php echo $i ?>][id]">
                            </td>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        <td class="sf_admin_text">
                            <input id="student_gradebook_item_final_grade_<?php echo $courseStudent->getStudent()->getId() ?>" name="student_gradebook_item_final_grade[<?php echo $courseStudent->getStudent()->getId() ?>]" type="text" class="grade" value="<?php echo $gradebook->calculateFinalGradeByStudent($courseStudent->getStudent()->getId()) ?>"/> (%)&nbsp;
                            <select class="grade">
                                <?php foreach ($gradebook->getGradebookScales() as $gradebookScale): ?>
                                    <?php $calculatedFinalGradebookScaleId = $gradebook->calculateFinalGradeScaleByStudent($courseStudent->getStudent()->getId()) ?>
                                    <option <?php echo ($calculatedFinalGradebookScaleId == $gradebookScale->getId()) ? "selected='selected'" : "" ?>><?php echo $gradebookScale->getCode() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </form>
    </div>
    <ul class="sf_admin_actions">
        <li class="sf_admin_action_new">
            <input type="button" value="Save Grades" class="save"/>
        </li>
        <li class="sf_admin_action_publish_course_grades">
            <input type="button" class="button" value="Publish Course Grades"/>
        </li>
        <li class="sf_admin_action_csv_download">
            <input type="button" class="button" value="CSV Download"/>
        </li>
    </ul>    
</div>
<script type="text/javascript">
    $(document).ready(function(){        
        $("input.grade").each(function(){            
            $(this).val(convertToDecimal($(this).val()));            
        });
        
        $("input.grade").AllowNumericOnly();
        
        $("input.grade").change(function(){            
            $(this).val(convertToDecimal($(this).val()));         
        });
        
        $("#gradebook_grades .sf_admin_action_new input").click(function(){      
            $("#gradebook_form_holder").hide();
            $('#gradebook_grades').append(loadingHtml);
            $("#gradebook_form").ajaxSubmit(function(data){
                $("#gradebook_grades").html(data);
            });
        });
    });  
</script>