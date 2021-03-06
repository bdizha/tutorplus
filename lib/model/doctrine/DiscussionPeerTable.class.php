<?php

/**
 * DiscussionPeerTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DiscussionPeerTable extends Doctrine_Table {

	const SUBSCRIPTION_TYPE_PROMPT_EMAIL = 0;
	const SUBSCRIPTION_TYPE_SUMMARY_EMAIL = 1;
	const SUBSCRIPTION_TYPE_DIGEST_EMAIL = 2;
	const MEMBERSHIP_TYPE_ORDINARY = 0;
	const MEMBERSHIP_TYPE_MANAGER = 1;
	const MEMBERSHIP_TYPE_OWNER = 2;
	const STATUS_JOINED = 0;
	const STATUS_WAITING = 1;
	const STATUS_IGNORED = 2;
	const STATUS_UNSUBSCRIBED = 3;
	const STATUS_CREATOR = 4;

	static public $subscription_types = array(
			0 => 'Prompt Email - can promptly receive emails for every activity.',
			1 => 'Summary Email - can only recieve group activity summary.',
			2 => 'Digest Email - can only recieve daily group activity summary.'
	);
	static public $membership_types = array(
			0 => 'Ordinary - can only read and post messages',
			1 => 'Manager - can change any group setting.',
			2 => 'Owner - can change any group setting.'
	);
	static public $statuses = array(
			0 => 'Joined - member accepted the invitation and has since joined.',
			1 => 'Waiting - member was sent an invitation, but hasn\'t joined yet.',
			2 => 'Ignored - member presummed ignored the sent invitation after a period of time.',
			3 => 'Unscribed - member got unscribed.',
			4 => 'Creator - member who created this group.'
	);
	static public $display_statuses = array(
			0 => 'Joined',
			1 => 'Waiting ',
			2 => 'Ignored',
			3 => 'Unscribed',
			4 => 'Creator'
	);

	/**
	 * Returns an instance of this class.
	 *
	 * @return object DiscussionPeerTable
	*/
	public static function getInstance() {
		return Doctrine_Core::getTable('DiscussionPeer');
	}

	public function getSubscriptionTypes() {
		return self::$subscription_types;
	}

	public function getMembershipTypes() {
		return self::$membership_types;
	}

	public function getStatuses() {
		return self::$statuses;
	}

	public function retrievePeers($discussionId, $isRemoved = 0) {
		$q = Doctrine_Query::create()
		->from('DiscussionPeer dp')
		->addWhere('dp.discussion_id = ?', $discussionId)
		->addWhere('dp.is_removed = ?', $isRemoved);

		return $q->execute();
	}

	public function deleteByProfileIdsAndDiscussionId($profileIds, $discussionId) {
		$q = $this->createQuery('dp')
		->delete()
		->whereIn('dp.profile_id', $profileIds)
		->andWhere('dp.discussion_id = ?', $discussionId)
		->execute();
	}

	public function getPeersByDiscussionIdAndProfileId($discussionId, $profileId) {
		$q = $this->createQuery('dp')
		->addWhere('dp.discussion_id = ?', $discussionId)
		->andWhere('dp.profile_id = ?', $profileId);

		return $q->fetchOne();
	}

	public function retrieveSuggestionsByStudentIdAndProfileId($studentId, $profileId, $discussionId, $limit = 2) {
		$randomizedSuggestions = array();

		$where = "(id IN (SELECT st.profile_id FROM Student st WHERE st.id IN (SELECT sc.student_id FROM StudentCourse sc WHERE sc.course_id IN (SELECT sc2.course_id FROM Studentcourse sc2 WHERE sc2.student_id = $studentId))) ";
		$where .= "OR (p.id IN (SELECT p1.inviter_id FROM peer p1 WHERE p1.invitee_id = $profileId)) ";
		$where .= "OR (p.id IN (SELECT p2.invitee_id FROM peer p2 WHERE p2.inviter_id = $profileId))) ";
		$where .= "AND (p.id NOT IN (SELECT dp.profile_id FROM DiscussionPeer dp WHERE dp.discussion_id = $discussionId))";
		$q = Doctrine_Query::create()
		->select('p.id, p.first_name, p.last_name')
		->from("Profile p")
		->where($where)
		->whereNotIn("p.id", array($profileId));

		$suggestedProfiles = $q->execute();
		$suggestedProfilesArray = $suggestedProfiles->toArray();

		if (count($suggestedProfiles) >= $limit) {
			$randomIndexes = array_rand($suggestedProfilesArray, $limit);
			foreach ($suggestedProfiles as $key => $user) {
				if (in_array($key, $randomIndexes)) {
					$randomizedSuggestions[] = $user;
				}
			}

			return $randomizedSuggestions;
		} else {
			return $suggestedProfiles;
		}

		return $suggestedProfiles;
	}

	public function findOneByDiscussionIdAndProfileId($discussionId, $profileId) {
		$q = $this->createQuery()
		->where('discussion_id = ?', $discussionId)
		->andWhere("profile_id = ?", $profileId);

		return $q->fetchOne();
	}

}