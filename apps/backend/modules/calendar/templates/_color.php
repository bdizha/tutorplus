<div class="<?php echo $class ?>">    
    <?php echo $form["color"]->renderLabel($label) ?>
    <div class="content <?php $form["color"]->hasError() and print ' errors' ?>">      
        <?php echo $form["color"]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
    </div>
</div>
<div id="color_picker_holder">
    <div id="color_picker">
        <div id="#3640AD" style="background-color: #3640AD; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#1111CC" style="background-color: #1111CC; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#228822" style="background-color: #228822; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#551A8B" style="background-color: #551A8B; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#FF0000" style="background-color: #FF0000; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#FF6600" style="background-color: #FF6600; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#CC0066" style="background-color: #CC0066; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#BFBFBF" style="background-color: #BFBFBF; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
    </div>
</div>