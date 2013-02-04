[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }
  
  public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/<?php echo str_replace("_", "/", $this->getModuleName()) ?>/new", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/<?php echo str_replace("_", "/", $this->getModuleName()) ?>/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/<?php echo str_replace("_", "/", $this->getModuleName()) ?>\'"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/<?php echo str_replace("_", "/", $this->getModuleName()) ?>\'"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }  
    
    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array());
    }

    public function indexLinks() {
        return array();
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array());
    }

    public function getNewLinks() {
        return array();
    }

    public function getEditBreadcrumbs($object) {
        return array('breadcrumbs' => array());
    }

    public function getEditLinks() {
        return array();
    }

    public function getPopupHeight() {
        return array("480px");
    }

    public function getPopupWidth() {
        return array("480px");
    }
}
