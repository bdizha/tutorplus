<?php

/**
 * common actions.
 *
 * @package    ecollegeplus
 * @subpackage common
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commonComponents extends sfComponents {

    public function executeMenu(sfWebRequest $request) {
        $menu = sfYaml::load(dirname(__FILE__) . "/../config/menu.yml");

        $this->menu = $menu['menu'];
    }

    public function executeHeader(sfWebRequest $request) {
    }

}