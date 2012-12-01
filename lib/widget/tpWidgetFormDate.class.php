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
        $this->addOption('months', $this->genereateMonthRange());
        $this->addOption('years', array_combine($this->genereateYearRange(), $this->genereateYearRange()));
        $this->addOption('can_be_empty', true);
        $this->addOption('empty_values', array('year' => 'YYYY', 'month' => 'MM', 'day' => 'DD'));
        $this->setAttributes(array("class" => "date-field"));
    }

    /**
     * Generates month range
     *
     * @return array
     */
    static protected function genereateMonthRange() {
        return array(
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December"
        );
    }

    /**
     * Generates year range
     *
     * @return array
     */
    static protected function genereateYearRange() {
        return range(date('Y') - 5, date('Y') + 5);
    }

}