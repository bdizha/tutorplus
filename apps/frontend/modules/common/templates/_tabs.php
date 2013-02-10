<?php if (count($tabs) > 0): ?>
    <div class="tabs">
        <ul class="nav-tabs">
            <?php foreach ($tabs as $id => $tab): ?>
                <li id="tab-<?php echo $id ?>" class="<?php echo (isset($tab["is_active"]) && $tab["is_active"] == true) ? 'active-tab' : ""; ?>">
                    <a href="<?php echo isset($tab["href"]) ? $tab["href"] : ""; ?>" class="tab-title"><?php echo $tab["label"]; ?></a>
                    <?php if (isset($tab["count"])): ?>
                        <span class="list-count"><?php echo $tab["count"] ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>