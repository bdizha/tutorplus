<?php

class sfWidgetFormSchemaFormatterNormal extends sfWidgetFormSchemaFormatter
{
  public function generateLabelName($name)
  {
  	return parent::generateLabelName($name).":";
  }
}