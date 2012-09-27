<?php if (count($actions) > 0): ?>
    <ul class="sf_admin_actions" style="clear:both">
        <?php foreach ($actions as $id => $action): ?>
            <li class="sf_admin_action_<?php echo $id; ?>">
                <input class="button" type="button" id="<?php echo $id; ?>" value="<?php echo $action["title"]; ?>" <?php echo (isset($action["url"]) == 1) ? "onclick=\"document.location.href='/backend.php/" . $action["url"] . "';return false\"" : "" ?>>                            
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>