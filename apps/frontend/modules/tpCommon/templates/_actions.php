<?php if (count($actions) > 0): ?>
    <ul class="sf_admin_actions" style="clear:both">
        <?php foreach ($actions as $id => $action): ?>
            <li class="sf_admin_action_<?php echo $id; ?>">
                <input class="button" type="button" href="<?php echo isset($action["href"]) ? $action["href"] : ""; ?>" id="<?php echo $id; ?>" value="<?php echo $action["title"]; ?>" <?php echo isset($action["url"]) ? "onclick=\"document.location.href='" . $action["url"] . "';return false\"" : "" ?>>                            
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>