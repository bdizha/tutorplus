<?php

/**
 * PeerTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PeerTable extends Doctrine_Table {

    const TYPE_STUDENT_STUDENT = 0;
    const TYPE_STUDENT_INSTRUCTOR = 1;
    const TYPE_INSTRUCTOR_STUDENT = 2;
    const TYPE_INSTRUCTOR_INSTRUCTOR = 3;
    const TYPE_INSTRUCTOR_STAFF = 4;
    const TYPE_STAFF_INSTRUCTOR = 5;
    const TYPE_STAFF_STAFF = 6;
    const STATUS_OPEN = 0;
    const STATUS_SUGGESTED = 1;
    const STATUS_INVITED = 2;
    const STATUS_PEERED = 3;
    const STATUS_DECLINED = 4;

    static public $types = array(
        0 => 'Student Student',
        1 => 'Student Instructor',
        2 => 'Instructor Student',
        3 => 'Instructor Instructor',
        4 => 'Instructor Staff',
        5 => 'Staff Instructor',
        6 => 'Staff Staff'
    );
    static public $statuses = array(
        0 => 'Open',
        1 => 'Suggested',
        2 => 'Invited',
        3 => 'Peered',
        4 => 'Declined'
    );

    /**
     * Returns an instance of this class.
     *
     * @return object PeerTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Peer');
    }

    public function getTypes() {
        return self::$types;
    }

    public function getStatuses() {
        return self::$statuses;
    }

    public static function getStatus($key) {
        return isset(self::$statuses[$key]) ? self::$statuses[$key] : "Undefined";
    }

    public function getType($inviterType = "Student", $inviteeType = "Student") {
        if ($inviterType == "" || $inviteeType == "") {
            return null;
        } else {
            $requestedType = $inviterType . " " . $inviteeType;
        }
        $peerTypes = self::$types;
        $flippedPeerTypes = array_flip($peerTypes);

        return isset($flippedPeerTypes[$requestedType]) ? $flippedPeerTypes[$requestedType] : null;
    }

    public function findByUserIdAndTypes($userId, $types) {
        $q = $this->createQuery('p')
                ->where('((p.inviter_id = ?) OR (p.invitee_id = ?))', array($userId, $userId))
                ->whereIn('p.type', $types);
        return $q->execute();
    }

    public function findByInviteeIdAndStatus($inviteeId, $status) {
        $q = $this->createQuery('p')
                ->where('p.inviter_id = ?', $inviteeId)
                ->addWhere('p.status = ?', $status);
        return $q->execute();
    }

    public function findByNotUserId($userId) {
        $q = Doctrine_Query::create()
                ->select('u.id, u.first_name, u.last_name')
                ->from("sfGuardUser u")
                ->addWhere('(u.id NOT IN (SELECT p1.inviter_id FROM peer p1 WHERE p1.invitee_id = ?))', $userId)
                ->addWhere('(u.id NOT IN (SELECT p2.invitee_id FROM peer p2 WHERE p2.inviter_id = ?))', $userId)
                ->whereNotIn("u.id", array($userId));

        return $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
    }

    public function findOneByPeers($inviterId, $inviteeId) {
        $q = $this->createQuery('p')
                ->where('(p.inviter_id = ? AND p.invitee_id = ?)', array($inviterId, $inviteeId))
                ->orWhere('(p.inviter_id = ? AND p.invitee_id = ?)', array($inviteeId, $inviterId));
        return $q->fetchOne();
    }

}