<?php

/**
 * sfGuardPermission form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardPermissionForm extends PluginsfGuardPermissionForm
{
  public function configure()
  {
    $this->widgetSchema['groups_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
    $this->widgetSchema['users_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
    $this->widgetSchema['menu_items_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
    
    $this->widgetSchema['due_date'] 	= new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
  }
}
