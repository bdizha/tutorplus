<?php

/**
 * profile module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage profile
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfileGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array(  '_cancel' =>   array(  ),  '_save' =>   array(  ),);
  }

  public function getEditActions()
  {
    return array(  '_cancel' =>   array(  ),  '_save' =>   array(  ),  '_done' =>   array(  ),);
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%id%% - %%first_name%% - %%last_name%% - %%email_address%% - %%username%% - %%algorithm%% - %%salt%% - %%password%% - %%is_active%% - %%is_super_admin%% - %%last_login%% - %%created_at%% - %%updated_at%% - %%slug%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Profile List';
  }

  public function getEditTitle()
  {
    return 'Edit Profile';
  }

  public function getNewTitle()
  {
    return 'New Profile';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',  1 => 'first_name',  2 => 'last_name',  3 => 'email_address',  4 => 'username',  5 => 'algorithm',  6 => 'salt',  7 => 'password',  8 => 'is_active',  9 => 'is_super_admin',  10 => 'last_login',  11 => 'created_at',  12 => 'updated_at',  13 => 'slug',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'first_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'last_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'email_address' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'username' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'algorithm' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'salt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'password' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'is_active' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'is_super_admin' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'last_login' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'slug' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'groups_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'permissions_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'sfGuardUserForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'sfGuardUserFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
