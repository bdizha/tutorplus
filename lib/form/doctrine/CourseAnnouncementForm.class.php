<?php

/**
 * CourseAnnouncement form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseAnnouncementForm extends BaseAnnouncementForm
{
  public function configure()
  {
		unset(
				$this['created_at'], $this['updated_at']
		);

		$user = sfContext::getInstance()->getUser();
		$profileId = $user->getId();
		$courseId = $user->getMyAttribute('course_show_id', null);

		$this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
		$this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();
		$this->widgetSchema['lock_until'] = new tpWidgetFormDate();
		$this->widgetSchema['lock_after'] = new tpWidgetFormDate();

		$this->validatorSchema['subject']->setMessage('required', 'The <b>Subject</b> field is required.');
		$this->validatorSchema['message']->setMessage('required', 'The <b>Announcement</b> field is required.');
		$this->validatorSchema['course_id'] = new sfValidatorString(array('required' => true));
		
		$this->setDefaults(array(
				'profile_id' => $profileId,
				'course_id' => $courseId
		));
  }
}
