<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormJQueryDate represents a date widget rendered by JQuery UI.
 *
 * This widget needs JQuery and JQuery UI to work.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormJQueryDate.class.php 30755 2010-08-25 11:14:33Z fabien $
 */
class sfWidgetFormJQueryDate extends sfWidgetForm
{
  /**
   * Configures the current widget.
   *
   * Available options:
   *
   *  * image:       The image path to represent the widget (false by default)
   *  * config:      A JavaScript array that configures the JQuery date widget
   *  * culture:     The user culture
   *  * date_widget: The date widget instance to use as a "base" class
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    if(sfContext::hasInstance())
    {
    	$this->addOption('culture', sfContext::getInstance()->getUser()->getCulture());
    }
    else
    {
    	$this->addOption('culture', "en");
    }
    	
    $this->addOption('change_month',  true);
    $this->addOption('change_year',  true);
    $this->addOption('number_of_months', 1);
    $this->addOption('show_button_panel',  false);
    $this->addOption('theme', '/sfJQueryUIPlugin/css/ui-lightness/jquery-ui.css');
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The date displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
  	$attributes = $this->getAttributes();
    $input = new sfWidgetFormInput(array(), $attributes);
    $html = $input->render($name, $value);

    $id = $input->generateId($name);
    $cm = $this->getOption("change_month") ? "true" : "false";
    $cy = $this->getOption("change_year") ? "true" : "false";
    $nom = $this->getOption("number_of_months");
    $sbp = $this->getOption("show_button_panel") ? "true" : "false";
    
    $html .= <<<EOHTML
<script type="text/javascript">
	$(function() {
    var params = {
    dateFormat : 'dd-mm-yy',
    changeMonth : $cm,
    changeYear : $cy,
    numberOfMonths : $nom,
    showButtonPanel : $sbp };
    $("#$id").datepicker(params);
    var myDate = $("#$id").val();
    /*$("#$id").val(myDate.replace(/-/g, '/'));*/
	});
</script>
EOHTML;
	return $html;
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavaScripts()
  {
    //check if jquery is loaded
    $js = array();
    if (sfConfig::has('sf_jquery_web_dir') && sfConfig::has('sf_jquery_core'))
      $js[] = sfConfig::get('sf_jquery_web_dir').'/js/'.sfConfig::get('sf_jquery_core');
    else
      $js[] = '/sfJQueryUIPlugin/js/jquery-1.3.1.min.js';

    $js[] = '/sfJQueryUIPlugin/js/jquery-ui.js';

    $culture = $this->getOption('culture');
    if ($culture!='en')
      $js[] = '/sfJQueryUIPlugin/js/i18n/ui.datepicker-'.$culture.".js";
    
    return $js;
  }
}
