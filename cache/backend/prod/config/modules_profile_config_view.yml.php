<?php
// auto-generated by sfViewConfigHandler
// date: 2012/09/30 11:56:46
$response = $this->context->getResponse();

if ($this->actionName.$this->viewName == 'newSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'editSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'indexSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'newSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == '' ? false : ''.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('elements.css', '', array ());
  $response->addStylesheet('tutorplus.css', '', array ());
  $response->addStylesheet('left-menu.css', '', array ());
  $response->addStylesheet('form.css', '', array ());
  $response->addStylesheet('symfony.css', '', array ());
  $response->addStylesheet('jquery.simple-modal.css', '', array ());
  $response->addStylesheet('jquery-ui.css', '', array ());
  $response->addStylesheet('jquery-date-picker.css', '', array ());
  $response->addStylesheet('/tiny_mce/themes/simple/skins/default/ui.css', '', array ());
  $response->addStylesheet('colorbox/jquery.colorbox.css', '', array ());
  $response->addStylesheet('profile.css', '', array ());
  $response->addStylesheet('discussion.css', '', array ());
  $response->addJavascript('jquery-1.6.2.min.js', '', array ());
  $response->addJavascript('jquery.form.js', '', array ());
  $response->addJavascript('jquery.validate.min.js', '', array ());
  $response->addJavascript('/sfFormExtraPlugin/js/double_list.js', '', array ());
  $response->addJavascript('/tiny_mce/tiny_mce.js', '', array ());
  $response->addJavascript('tutorplus.js', '', array ());
  $response->addJavascript('jquery.treeview.js', '', array ());
  $response->addJavascript('jquery.number_format.js', '', array ());
  $response->addJavascript('jquery.validate.numeric.js', '', array ());
  $response->addJavascript('jquery-ui.min.js', '', array ());
  $response->addJavascript('jquery.elastic.source.js', '', array ());
  $response->addJavascript('jquery.colorbox-min.js', '', array ());
}
else if ($templateName.$this->viewName == 'editSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == '' ? false : ''.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('elements.css', '', array ());
  $response->addStylesheet('tutorplus.css', '', array ());
  $response->addStylesheet('left-menu.css', '', array ());
  $response->addStylesheet('form.css', '', array ());
  $response->addStylesheet('symfony.css', '', array ());
  $response->addStylesheet('jquery.simple-modal.css', '', array ());
  $response->addStylesheet('jquery-ui.css', '', array ());
  $response->addStylesheet('jquery-date-picker.css', '', array ());
  $response->addStylesheet('/tiny_mce/themes/simple/skins/default/ui.css', '', array ());
  $response->addStylesheet('colorbox/jquery.colorbox.css', '', array ());
  $response->addStylesheet('profile.css', '', array ());
  $response->addStylesheet('discussion.css', '', array ());
  $response->addJavascript('jquery-1.6.2.min.js', '', array ());
  $response->addJavascript('jquery.form.js', '', array ());
  $response->addJavascript('jquery.validate.min.js', '', array ());
  $response->addJavascript('/sfFormExtraPlugin/js/double_list.js', '', array ());
  $response->addJavascript('/tiny_mce/tiny_mce.js', '', array ());
  $response->addJavascript('tutorplus.js', '', array ());
  $response->addJavascript('jquery.treeview.js', '', array ());
  $response->addJavascript('jquery.number_format.js', '', array ());
  $response->addJavascript('jquery.validate.numeric.js', '', array ());
  $response->addJavascript('jquery-ui.min.js', '', array ());
  $response->addJavascript('jquery.elastic.source.js', '', array ());
  $response->addJavascript('jquery.colorbox-min.js', '', array ());
}
else if ($templateName.$this->viewName == 'indexSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('elements.css', '', array ());
  $response->addStylesheet('tutorplus.css', '', array ());
  $response->addStylesheet('left-menu.css', '', array ());
  $response->addStylesheet('form.css', '', array ());
  $response->addStylesheet('symfony.css', '', array ());
  $response->addStylesheet('jquery.simple-modal.css', '', array ());
  $response->addStylesheet('jquery-ui.css', '', array ());
  $response->addStylesheet('jquery-date-picker.css', '', array ());
  $response->addStylesheet('/tiny_mce/themes/simple/skins/default/ui.css', '', array ());
  $response->addStylesheet('colorbox/jquery.colorbox.css', '', array ());
  $response->addStylesheet('profile.css', '', array ());
  $response->addStylesheet('discussion.css', '', array ());
  $response->addJavascript('jquery-1.6.2.min.js', '', array ());
  $response->addJavascript('jquery.form.js', '', array ());
  $response->addJavascript('jquery.validate.min.js', '', array ());
  $response->addJavascript('/sfFormExtraPlugin/js/double_list.js', '', array ());
  $response->addJavascript('/tiny_mce/tiny_mce.js', '', array ());
  $response->addJavascript('tutorplus.js', '', array ());
  $response->addJavascript('jquery.treeview.js', '', array ());
  $response->addJavascript('jquery.number_format.js', '', array ());
  $response->addJavascript('jquery.validate.numeric.js', '', array ());
  $response->addJavascript('jquery-ui.min.js', '', array ());
  $response->addJavascript('jquery.elastic.source.js', '', array ());
  $response->addJavascript('jquery.colorbox-min.js', '', array ());
}
else
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('elements.css', '', array ());
  $response->addStylesheet('tutorplus.css', '', array ());
  $response->addStylesheet('left-menu.css', '', array ());
  $response->addStylesheet('form.css', '', array ());
  $response->addStylesheet('symfony.css', '', array ());
  $response->addStylesheet('jquery.simple-modal.css', '', array ());
  $response->addStylesheet('jquery-ui.css', '', array ());
  $response->addStylesheet('jquery-date-picker.css', '', array ());
  $response->addStylesheet('/tiny_mce/themes/simple/skins/default/ui.css', '', array ());
  $response->addStylesheet('colorbox/jquery.colorbox.css', '', array ());
  $response->addStylesheet('profile.css', '', array ());
  $response->addStylesheet('discussion.css', '', array ());
  $response->addJavascript('jquery-1.6.2.min.js', '', array ());
  $response->addJavascript('jquery.form.js', '', array ());
  $response->addJavascript('jquery.validate.min.js', '', array ());
  $response->addJavascript('/sfFormExtraPlugin/js/double_list.js', '', array ());
  $response->addJavascript('/tiny_mce/tiny_mce.js', '', array ());
  $response->addJavascript('tutorplus.js', '', array ());
  $response->addJavascript('jquery.treeview.js', '', array ());
  $response->addJavascript('jquery.number_format.js', '', array ());
  $response->addJavascript('jquery.validate.numeric.js', '', array ());
  $response->addJavascript('jquery-ui.min.js', '', array ());
  $response->addJavascript('jquery.elastic.source.js', '', array ());
  $response->addJavascript('jquery.colorbox-min.js', '', array ());
}

