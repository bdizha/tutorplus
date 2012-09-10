<?php

function yesOrNo($conditition = false)
{
    return ($conditition) ? "<span class='green'>Yes</span>" : "<span class='red'>No</span>";
}

function getCorrespondenceStatus($status_id = 0)
{
    return CorrespondenceTable::getStatus($status_id);
}