<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * tpWidgetFormDate represents a date widget.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormDate.class.php 30762 2010-08-25 12:33:33Z fabien $
 */
class tpWidgetFormDate extends sfWidgetFormDate {

    /**
     * Configures the current widget.
     *
     * Available options:
     *
     *  * format:       The date format string (%month%/%day%/%year% by default)
     *  * years:        An array of years for the year select tag (optional)
     *                  Be careful that the keys must be the years, and the values what will be displayed to the user
     *  * months:       An array of months for the month select tag (optional)
     *  * days:         An array of days for the day select tag (optional)
     *  * can_be_empty: Whether the widget accept an empty value (true by default)
     *  * empty_values: An array of values to use for the empty value (empty string for year, month, and day by default)
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array()) {
        $this->addOption('format', "%day%&nbsp;-&nbsp;%month%&nbsp;-&nbsp;%year%");
        $this->addOption('days', parent::generateTwoCharsRange(1, 31));
        $this->addOption('months', parent::generateTwoCharsRange(1, 12));
        $years = range(date('Y') - 5, date('Y') + 5);
        $this->addOption('years', array_combine($years, $years));
        $this->addOption('can_be_empty', true);
        $this->addOption('empty_values', array('year' => '', 'month' => '', 'day' => ''));
        $this->setAttributes(array("class" => "date-field"));
    }

}