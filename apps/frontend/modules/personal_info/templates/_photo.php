<?php $image = "<img src=\"/profile/show/photo/" . $profile->getId() . "/" . $dimension . "/" . time() . "\" class=\"image\" alt=\"" . $profile->getName() . "\" title=\"" . $profile->getName() . "\"/>" ?>
<?php $extraClass = (isset($cssClass)) ? " " . $cssClass : "" ?>
<?php echo link_to($image, 'profile_show', $profile, array("class" => "photo-link" . $extraClass, "style" => "width:" . $dimension . "px;height:" . $dimension . "px;")) ?>