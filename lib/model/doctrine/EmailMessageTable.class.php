<?php

/**
 * EmailMessageTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EmailMessageTable extends Doctrine_Table {

  const EMAIL_MESSAGE_STATUS_SENT = 0;
  const EMAIL_MESSAGE_STATUS_RECEIVED = 1;
  const EMAIL_MESSAGE_STATUS_SAVED = 2;
  const EMAIL_MESSAGE_RECIPIENT_TYPE_TO = "to_email";
  const EMAIL_MESSAGE_RECIPIENT_TYPE_CC = "cc_email";
  const EMAIL_MESSAGE_RECIPIENT_TYPE_BCC = "bcc_email";

  static public $statuses = array(
      0 => 'Sent',
      1 => 'Received',
      2 => 'Saved'
  );

  /**
   * Returns an instance of this class.
   *
   * @return object EmailMessageTable
   */
  public static function getInstance() {
    return Doctrine_Core::getTable('EmailMessage');
  }

  public function getStatuses() {
    return self::$statuses;
  }

  public function updateByPks($ids = array(), $modifiedFields = array()) {
    Doctrine_Query::create()
        ->update('EmailMessage')
        ->set($modifiedFields)
        ->whereIn('id', $ids)
        ->execute();
  }

  public function countInboxByEmail($email) {
    return Doctrine_Core::getTable('EmailMessage')
            ->createQuery('a')
            ->addWhere("to_email like ?", "%{$email}%")
            ->andWhere("is_trashed = ?", 0)
            ->andWhere("is_read = ?", 0)
            ->andWhere("status = ?", 1)
            ->count();
  }

  public function countSentByEmail($email) {
    return Doctrine_Core::getTable('EmailMessage')
            ->createQuery('a')
            ->addWhere("from_email like ?", "%{$email}%")
            ->andWhere("status = ?", 0)
            ->andWhere("is_read = ?", 0)
            ->andWhere("is_trashed = ?", 0)
            ->count();
  }

  public function countDraftsByEmail($email) {
    return Doctrine_Core::getTable('EmailMessage')
            ->createQuery('a')
            ->addWhere("from_email like ?", "%{$email}%")
            ->andWhere("status = ?", 2)
            ->execute()
            ->count();
  }

  public function countTrashByEmail($email) {
    return Doctrine_Core::getTable('EmailMessage')
            ->createQuery('a')
            ->addWhere("from_email like ? OR to_email like ?", array("%{$email}%", "%{$email}%"))
            ->andWhere("is_trashed = ?", 1)
            ->count();
  }

}