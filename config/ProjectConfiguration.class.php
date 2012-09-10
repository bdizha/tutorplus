<?php

require_once '/usr/share/php5/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin', 'sfDoctrineGuardPlugin', 'sfFormExtraPlugin', 'sfThumbnailPlugin');
  }
}