<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks($course)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("Instructors", "course/instructors")) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs("instructors"))) ?>
        <div class="tab-block">
            <div id="course_instructors_form_holder">
                <form id="course_instructors_form"
                      action="<?php echo url_for('@course_instructors') ?>"
                      method="post">
                          <?php include_partial('tpCommon/form_actions') ?>
                          <?php foreach ($myInstructorPeers as $peer): ?>
                              <?php if ($peer->getInviteeId() == $sf_user->getId()): ?>
                                  <?php $profile = $peer->getInviter(); ?>
                              <?php else: ?>
                                  <?php $profile = $peer->getInvitee(); ?>
                              <?php endif; ?>
                        <div class="peer">
                            <input type="checkbox" class="input-checkbox" name="peers[]"
                                   value="<?php echo $profile["id"] ?>"
                                   <?php echo (is_array($currentInstructorIds) && in_array($profile["id"], $currentInstructorIds)) ? "checked='checked'" : "" ?>
                                   id="peers_<?php echo $profile["id"] ?>" />
                            <div class="description">
                                <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 36)) ?>
                                <div class="name">
                                    <?php echo $profile ?>
                                </div>
                                <div class="institution">
                                    <?php echo $profile->getInstitution() ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php include_partial('tpCommon/form_actions') ?>
                </form>
            </div>
        </div>
    </div>
</div>