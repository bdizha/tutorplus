<?php $image = "<img src=\"/profile/show/photo/" . $profile->getId() . "/" . $dimension . "/" . time() . "\" class=\"image\" alt=\"" . $profile->getName() . "\" title=\"" . $profile->getName() . "\"/>" ?>
<?php $cssClass = (isset($cssClass)) ? $cssClass : "photo-link" ?>
<?php echo link_to($image, 'profile_show', $profile, array("class" => $cssClass, "style" => "border-radius: " . ($dimension/2). "px;")) ?>