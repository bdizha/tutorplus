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
class sfWidgetFormJQueryDate extends sfWidgetFormInput {

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
    protected function configure($options = array(), $attributes = array()) {
        $this->addOption('image', false);
        $this->addOption('min', 0);
        $this->addOption('max', 4000000);

        parent::configure($options, $attributes);
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
    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        $prefix = str_replace('-', '_', $this->generateId($name));

        $min = $this->getOption('min');
        $max = $this->getOption('max');

        return $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes)) .
                sprintf(<<<EOF
   
<script type="text/javascript">
    $(document).ready(function(){
   $("#%s").dateinput({
            format: 'dd-mm-yyyy',
            selectors: true,   
            min: %s,   
            max: %s,
            offset: [0, 5],
            speed: 'fast', 
            firstDay: 1
        });        
        $("#calprev").html("<");
        $("#calnext").html(">");
    }); 
</script>   
EOF
                        , $prefix, $min, $max
        );
    }

}
