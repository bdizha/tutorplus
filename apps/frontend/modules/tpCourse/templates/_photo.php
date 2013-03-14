<?php $image = "<img src=\"/uploads/courses/" . $course->getId() . "/" . $dimension . ".png\" class=\"image\" alt=\"" . $course->getName() . "\" title=\"" . $course->getName() . "\"/>" ?>
<?php $cssClass = (isset($cssClass)) ? $cssClass : "photo-link" ?>
<?php echo link_to($image, 'course_show', $course, array("class" => $cssClass)) ?>