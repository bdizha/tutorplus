<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardFormSignin.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardFormSignin extends BasesfGuardFormSignin
{

    /**
     * @see sfForm
     */
    public function configure()
    {
        $this->validatorSchema['username'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>username</b> field is required.'));
        $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>password</b> field is required.'));

        $this->disableLocalCSRFProtection();
    }

}
