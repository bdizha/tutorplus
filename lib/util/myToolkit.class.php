<?php

class myToolkit extends sfToolkit {

    public static function debug($data) {
        echo "<pre>";
        if (is_array($data) || is_object($data))
            print_r($data);
        else
            echo $data;
        die("</pre>");
    }

    /**
     * Returns a random string
     */
    public static function random($length = 8) {
        $val = '';
        $values = 'abcdefghijklmnopqrstuvwxyz0123456789';
        for ($i = 0; $i < $length; $i++) {
            $val .= $values[rand(0, 35)];
        }

        return $val;
    }

    public static function shortenString($string, $strLen = 100) {
        if (strlen($string) > $strLen) {
            if (strrpos(substr($string, 0, $strLen + 2), " ") == "") {
                return substr($string, 0, $strLen - 3) . " ...";
            } else {
                return substr($string, 0, strrpos(substr($string, 0, $strLen + 2), " ")) . " ...";
            }
        } else {
            return $string;
        }
    }

    /**
     * @param  string  $string
     * @return string
     */
    public static function sanitizeString($string) {
        return preg_replace('/[^a-z0-9_\.-]/i', '_', $string);
    }

    /**
     * @param  string  $string
     * @return string
     */
    public static function dateInWords($date) {
        return distance_of_time_in_words(strtotime($date)) . " ago";
    }
    
    public static function formattedDate($date, $format){
        return format_date($date, $format);
    }

}