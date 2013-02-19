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
    $clean = (string) $value;

    // does this email exist
    $profile = Doctrine_Core::getTable('Profile')
        ->retrieveByEmail($clean);
    if ($profile) {
      return $value;
    }

    throw new sfValidatorError($this, 'invalid', array('value' => $value));
  }

}
