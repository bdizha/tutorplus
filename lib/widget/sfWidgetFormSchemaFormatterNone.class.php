<?php

class sfWidgetFormSchemaFormatterNone extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat       = "%field%\n%hidden_fields%\n",
    $errorRowFormat  = '',
    $helpFormat      = '',
    $decoratorFormat = "%content%";
}
