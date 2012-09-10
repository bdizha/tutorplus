<?php

/**
 * student_contact module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage student_contact
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseStudent_contactGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  'cancel' =>   array(  ),  '_save' =>   array(  ),);
  }

  public function getEditActions()
  {
    return array(  'cancel' =>   array(  ),  'done' =>   array(  ),  '_save' =>   array(  ),);
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
    return array();
  }

  public function getListParams()
  {
    return '%%email_address%% - %%address_line_1%% - %%address_line_2%% - %%postcode%% - %%city%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Student Contacts';
  }

  public function getEditTitle()
  {
    return 'Edit Student Contact';
  }

  public function getNewTitle()
  {
    return 'New Student contact';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array(  'Physical Address' =>   array(    0 => 'email_address',    1 => 'phone_work',    2 => 'phone_home',    3 => 'phone_mobile',    4 => 'address_line_1',    5 => 'address_line_2',    6 => 'postcode',    7 => 'city',    8 => 'country_id',    9 => 'state_province_id',  ),  'Postal Address' =>   array(    0 => 'postal_address_line_1',    1 => 'postal_address_line_2',    2 => 'postal_postcode',    3 => 'postal_city',    4 => 'postal_country_id',    5 => 'postal_state_province_id',  ),  'Guardian Details' =>   array(    0 => 'guardian_first_name',    1 => 'guardian_last_name',    2 => 'guardian_email_address',    3 => 'guardian_phone_work',    4 => 'guardian_phone_home',    5 => 'guardian_phone_mobile',    6 => 'guardian_address_line_1',    7 => 'guardian_address_line_2',    8 => 'guardian_postcode',    9 => 'guardian_city',    10 => 'guardian_country_id',    11 => 'guardian_state_province_id',  ),);
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
    return array(  0 => 'email_address',  1 => 'address_line_1',  2 => 'address_line_2',  3 => 'postcode',  4 => 'city',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'email_address' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'phone_work' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'phone_home' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'phone_mobile' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'address_line_1' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'address_line_2' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'postcode' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'city' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'country_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'state_province_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'student_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'postal_address_line_1' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Home address 1',),
      'postal_address_line_2' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Home address 2',),
      'postal_postcode' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Postcode',),
      'postal_city' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'City',),
      'postal_country_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Country',),
      'postal_state_province_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'State province',),
      'guardian_first_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'First name',),
      'guardian_last_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Last name',),
      'guardian_email_address' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Email address',),
      'guardian_phone_work' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Phone work',),
      'guardian_phone_home' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Phone home',),
      'guardian_phone_mobile' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Phone mobile',),
      'guardian_address_line_1' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Home address 1',),
      'guardian_address_line_2' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Home address 2',),
      'guardian_postcode' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Postcode',),
      'guardian_city' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'City',),
      'guardian_country_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Country',),
      'guardian_state_province_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'State province',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'email_address' => array(),
      'phone_work' => array(),
      'phone_home' => array(),
      'phone_mobile' => array(),
      'address_line_1' => array(),
      'address_line_2' => array(),
      'postcode' => array(),
      'city' => array(),
      'country_id' => array(),
      'state_province_id' => array(),
      'student_id' => array(),
      'postal_address_line_1' => array(),
      'postal_address_line_2' => array(),
      'postal_postcode' => array(),
      'postal_city' => array(),
      'postal_country_id' => array(),
      'postal_state_province_id' => array(),
      'guardian_first_name' => array(),
      'guardian_last_name' => array(),
      'guardian_email_address' => array(),
      'guardian_phone_work' => array(),
      'guardian_phone_home' => array(),
      'guardian_phone_mobile' => array(),
      'guardian_address_line_1' => array(),
      'guardian_address_line_2' => array(),
      'guardian_postcode' => array(),
      'guardian_city' => array(),
      'guardian_country_id' => array(),
      'guardian_state_province_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'email_address' => array(),
      'phone_work' => array(),
      'phone_home' => array(),
      'phone_mobile' => array(),
      'address_line_1' => array(),
      'address_line_2' => array(),
      'postcode' => array(),
      'city' => array(),
      'country_id' => array(),
      'state_province_id' => array(),
      'student_id' => array(),
      'postal_address_line_1' => array(),
      'postal_address_line_2' => array(),
      'postal_postcode' => array(),
      'postal_city' => array(),
      'postal_country_id' => array(),
      'postal_state_province_id' => array(),
      'guardian_first_name' => array(),
      'guardian_last_name' => array(),
      'guardian_email_address' => array(),
      'guardian_phone_work' => array(),
      'guardian_phone_home' => array(),
      'guardian_phone_mobile' => array(),
      'guardian_address_line_1' => array(),
      'guardian_address_line_2' => array(),
      'guardian_postcode' => array(),
      'guardian_city' => array(),
      'guardian_country_id' => array(),
      'guardian_state_province_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'email_address' => array(),
      'phone_work' => array(),
      'phone_home' => array(),
      'phone_mobile' => array(),
      'address_line_1' => array(),
      'address_line_2' => array(),
      'postcode' => array(),
      'city' => array(),
      'country_id' => array(),
      'state_province_id' => array(),
      'student_id' => array(),
      'postal_address_line_1' => array(),
      'postal_address_line_2' => array(),
      'postal_postcode' => array(),
      'postal_city' => array(),
      'postal_country_id' => array(),
      'postal_state_province_id' => array(),
      'guardian_first_name' => array(),
      'guardian_last_name' => array(),
      'guardian_email_address' => array(),
      'guardian_phone_work' => array(),
      'guardian_phone_home' => array(),
      'guardian_phone_mobile' => array(),
      'guardian_address_line_1' => array(),
      'guardian_address_line_2' => array(),
      'guardian_postcode' => array(),
      'guardian_city' => array(),
      'guardian_country_id' => array(),
      'guardian_state_province_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'email_address' => array(),
      'phone_work' => array(),
      'phone_home' => array(),
      'phone_mobile' => array(),
      'address_line_1' => array(),
      'address_line_2' => array(),
      'postcode' => array(),
      'city' => array(),
      'country_id' => array(),
      'state_province_id' => array(),
      'student_id' => array(),
      'postal_address_line_1' => array(),
      'postal_address_line_2' => array(),
      'postal_postcode' => array(),
      'postal_city' => array(),
      'postal_country_id' => array(),
      'postal_state_province_id' => array(),
      'guardian_first_name' => array(),
      'guardian_last_name' => array(),
      'guardian_email_address' => array(),
      'guardian_phone_work' => array(),
      'guardian_phone_home' => array(),
      'guardian_phone_mobile' => array(),
      'guardian_address_line_1' => array(),
      'guardian_address_line_2' => array(),
      'guardian_postcode' => array(),
      'guardian_city' => array(),
      'guardian_country_id' => array(),
      'guardian_state_province_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'email_address' => array(),
      'phone_work' => array(),
      'phone_home' => array(),
      'phone_mobile' => array(),
      'address_line_1' => array(),
      'address_line_2' => array(),
      'postcode' => array(),
      'city' => array(),
      'country_id' => array(),
      'state_province_id' => array(),
      'student_id' => array(),
      'postal_address_line_1' => array(),
      'postal_address_line_2' => array(),
      'postal_postcode' => array(),
      'postal_city' => array(),
      'postal_country_id' => array(),
      'postal_state_province_id' => array(),
      'guardian_first_name' => array(),
      'guardian_last_name' => array(),
      'guardian_email_address' => array(),
      'guardian_phone_work' => array(),
      'guardian_phone_home' => array(),
      'guardian_phone_mobile' => array(),
      'guardian_address_line_1' => array(),
      'guardian_address_line_2' => array(),
      'guardian_postcode' => array(),
      'guardian_city' => array(),
      'guardian_country_id' => array(),
      'guardian_state_province_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'StudentContactForm';
  }

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'StudentContactFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 10;
  }

  public function getDefaultSort()
  {
    return array('email_address', 'asc');
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
