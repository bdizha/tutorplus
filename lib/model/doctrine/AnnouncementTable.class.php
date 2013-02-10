<?php

/**
 * AnnouncementTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AnnouncementTable extends Doctrine_Table {

	/**
	 * Returns an instance of this class.
	 *
	 * @return object AnnouncementTable
	 */
	public static function getInstance() {
		return Doctrine_Core::getTable('Announcement');
	}

	public function findLatest($limit = 3) {
		$q = Doctrine_Query::create()
		->from('Announcement a')
		->addOrderBy('a.created_at DESC');
		$q->limit($limit);

		return $q->execute();
	}

	public function retrieveOrdered(Doctrine_Query $q = null) {
		if (is_null($q)) {
			$q = Doctrine_Query::create()
			->from('Announcement a');
		}
		$q->addOrderBy('a.created_at DESC');

		return $q->execute();
	}

	public function findByCourseId($courseId) {
		$q = $this->createQuery('a')
		->innerJoin('a.CourseAnnouncement ca')
		->where('ca.course_id = ?', $courseId)
		->addOrderBy('a.created_at DESC');

		return $q->execute();
	}

}