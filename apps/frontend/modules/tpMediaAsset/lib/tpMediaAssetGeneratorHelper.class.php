<?php

/**
 * tpMediaAsset module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpMediaAsset
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpMediaAssetGeneratorHelper extends BaseTpMediaAssetGeneratorHelper
{

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course/explorer",
                "System Settings" => "tpMediaAsset",
                "Media Assets" => "tpMediaAsset"
            )
        );
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "system_settings",
            "current_link" => "media_assets"
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course/explorer",
                "System Settings" => "tpMediaAsset",
                "Media Assets" => "tpMediaAsset"
            )
        );
    }

    public function getNewLinks()
    {
        return $this->indexLinks();
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Settings" => "course/explorer",
                "System Settings" => "tpMediaAsset",
                "Media Assets" => "tpMediaAsset",
                "Edit Asset" => "tpMediaAsset"
            )
        );
    }

    public function getEditLinks()
    {
        return $this->indexLinks();
    }

}