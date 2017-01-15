<?php namespace MPRF\Common;
/*
 * File: Helper.php
 *
 * MMF (Monty Micro Framework). A PHP Micro Framework for Rest apps.
 * Created by Ivan Montilla <personal@ivanmontilla.es>
 *
 * Official website:  mmf-php.com
 * Documentation:     docs.mmf-php.com
 *
 * You have permission to use, adapt and redistribute this
 * code or adaption.
 * You can use this framework or adaption for make apps
 * with profit, but never sell this framework or adaption.
 *
 * Get started in docs.mmf-php.com/quickstart
 */

/**
 * Class with some statics utils functions.
 *
 * @package Framework\Common
 * @author Ivan Montilla
 * @since 1.0/F-04/2017
 */
abstract class Utils {

    /**
     * Transform a value's array to references' array.
     *
     * @since 1.0/F-04/2017
     * @param array $arr
     * @return array
     */
    public static function transformArrayToReferencedArray($arr){
        //Reference is required for PHP 5.3+
        if (strnatcmp(phpversion(), '5.3') >= 0) {
            $refs = [];
            foreach($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }

    /**
     * Like a "pass" keyword in Python!
     *
     * This method does nothing. Is util for stop code with breakpoint
     * in the line when this method is called and evaluate last line, if
     * isn't any line beyond.
     *
     * Other possible utility of this method is call it on block
     * that isn't implemented yet with to-do comment.
     *
     * @since 1.0/F-04/2017
     */
    public static function doNothing() {}


    /**
     * Generate random string with alphanumerical characters with lower case letters,
     * upper case letters and numbers.
     *
     * @param int $length
     * @return string
     * @since 1.0/F-05/2017
     */
    public static function generateRandomString($length) {
        $characters = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $str;
    }
}