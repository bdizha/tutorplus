<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getgetLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3>
        <?php include_partial('tpCourse/photo', array('course' => $course, "dimension" => 24)) ?>
        <?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
    </h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('tpCommon/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs($courseDiscussions, "index")) ?>
        <div class="tab-block">
            <?php if (!$courseDiscussions->count()): ?>
                This course doesn't have any started discussions yet.
            <?php else: ?>
                <ul class="sf_admin_actions">
                    <?php include_partial('tpCourseDiscussion/list_actions', array('helper' => $helper)) ?>
                </ul>
                <?php include_partial('tpCourseDiscussion/list', array('courseDiscussions' => $courseDiscussions, 'helper' => $helper)) ?>
            <?php endif; ?>
            <ul class="sf_admin_actions">
                <?php include_partial('tpCourseDiscussion/list_actions', array('helper' => $helper)) ?>
            </ul>
        </div>
    </div>
</div>
