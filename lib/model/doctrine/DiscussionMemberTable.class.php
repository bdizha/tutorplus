<?php

/**
 * DiscussionMemberTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DiscussionMemberTable extends Doctrine_Table {

    const SUBSCRIPTION_TYPE_PROMPT_EMAIL = 0;
    const SUBSCRIPTION_TYPE_SUMMARY_EMAIL = 1;
    const SUBSCRIPTION_TYPE_DIGEST_EMAIL = 2;
    const MEMBERSHIP_TYPE_ORDINARY = 0;
    const MEMBERSHIP_TYPE_MANAGER = 1;
    const MEMBERSHIP_TYPE_OWNER = 2;
    const POSTING_PERMISSION_TYPE_DEFAULT = 0;
    const POSTING_PERMISSION_TYPE_OWNER = 1;
    const POSTING_PERMISSION_TYPE_CO_OWNER = 2;
    const POSTING_PERMISSION_TYPE_RESTRICTED = 3;
    const POSTING_PERMISSION_TYPE_GUEST = 4;
    const STATUS_JOINED = 0;
    const STATUS_WAITING = 1;
    const STATUS_IGNORED = 2;
    const STATUS_UNSUBSCRIBED = 3;
    const STATUS_CREATOR = 4;

    static public $subscription_types = array(
        0 => 'Prompt Email - can promptly receive emails for every activity.',
        1 => 'Summary Email - can only recieve discussion activity summary.',
        2 => 'Digest Email - can only recieve daily discussion activity summary.'
    );
    static public $membership_types = array(
        0 => 'Ordinary - can only read and post messages',
        1 => 'Manager - can change any group setting.',
        2 => 'Owner - can change any group setting.'
    );
    static public $posting_permission_types = array(
        0 => 'Default - member is allowed to post',
        1 => 'Owner - member has all the rights to this group',
        2 => 'Co-owner - member is allowed to act as the group owner',
        3 => 'Restricted - member is not allowed to post',
        4 => 'Guest - member\'s posts are moderated'
    );
    static public $statues = array(
        0 => 'Joined - member accepted the invitation and has since joined.',
        1 => 'Waiting - member was sent an invitation, but hasn\'t joined yet.',
        2 => 'Ignored - member presummed ignored the sent invitation after a period of time.',
        3 => 'Unscribed - member got unscribed.',
        4 => 'Creator - member who created this group.'
    );

    /**
     * Returns an instance of this class.
     *
     * @return object DiscussionMemberTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('DiscussionMember');
    }

    public function getSubscriptionTypes() {
        return self::$subscription_types;
    }

    public function getMembershipTypes() {
        return self::$membership_types;
    }

    public function getPostingPermissionsType() {
        return self::$posting_permission_types;
    }

    public function getStatues() {
        return self::$statues;
    }

    public function retrieveMembers($discussionId, $isRemoved = 0) {
        $q = Doctrine_Query::create()
                ->from('DiscussionMember dm')
                ->addWhere('dm.discussion_id = ?', $discussionId)
                ->addWhere('dm.is_removed = ?', $isRemoved);

        return $q->execute();
    }

    public function getNbNewMembersJoined($courseId = null) {
        $q = $this->createQuery('dm')
                ->innerJoin('dm.Discussion d');
        if ($courseId) {
            $q->innerJoin('d.CourseDiscussion cd')
                    ->addWhere('cd.course_id = ?', $courseId);
        }

        $q->addWhere('dm.created_at > ?', date('d-m-y H:i:s', strtotime("NOW - 7 days")));
        return $q->execute();
    }

    public function unSubscribeByUserIdsAndDiscussionId($userIds, $discussionId) {
        $query = $this->createQuery()
                ->update()
                ->set("is_removed", "?", 1)
                ->whereIn('user_id', $userIds)
                ->andWhere("discussion_id = ?", $discussionId);

        return $query->execute();
    }

    public function getMembersByDiscussionIdAndUserId($discussionId, $userId) {
        $q = $this->createQuery('dm')
                ->addWhere('dm.discussion_id = ?', $discussionId)
                ->andWhere('dm.user_id = ?', $userId);

        return $q->fetchOne();
    }

}