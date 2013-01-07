<?php

/**
 * ActivityFeedTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ActivityFeedTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object ActivityFeedTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('ActivityFeed');
    }

    public function findByProfileId($profileId, $limit = null) {
        $q = Doctrine_Query::create()
                ->from('ActivityFeed af')
                ->innerJoin('af.ActivityFeedProfiles afu')
                ->andWhere('afu.profile_id = ?', $profileId);
        if ($limit) {
            $q->limit($limit);
        }

        $q->addOrderBy('af.created_at DESC');
        return $q->execute();
    }

}