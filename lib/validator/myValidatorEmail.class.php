<?php
/**
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku <batanayi@tutorplus.org>
 */
class myValidatorEmail extends sfValidatorBase {

  public function configure($options = array(), $messages = array()) {
    $this->setMessage('invalid', 'There\'s no profile available for this <b>Email</b>.');
  }

  protected function doClean($value) {
    // does this email exist
    $profile = Doctrine_Core::getTable('Profile')
        ->retrieveByEmail($value['email']);
    if ($profile || empty($value['email'])) {
      return $value;
    }

    throw new sfValidatorError($this, 'invalid');
  }

}
