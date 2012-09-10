<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  public function configure()
  {
  	$this->widgetSchema['groups_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
  	$this->widgetSchema['permissions_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
  }
  
  /**
  * Override the save method to save the merged user info form.
  */
  public function save($con = null)
  {
    return parent::save();
    //$this->updateProfile();
    //return $this->getObject();
  }
  
  /**
  * Updates the user profile merged form
  */
  protected function updateProfile()
  {
    if(!is_null($profile = $this->getProfile()))
    { 
      $values = $this->getValues();
      $values['user_id'] = $this->getObject()->getId();
     
      $profile->fromArray($values, false);     
      $profile->save();
    }
  }
  
  /**
  * Returns the profile object. If it does
  * not exist return a new instance.
  *
  * @return Profile
  */
  protected function getProfile()
  {
    if(!$this->getObject()->getProfile())
    {
      return new Profile();
    }
   
    return $this->getObject()->getProfile();
  }
}
