<?php

class TextShorter {

    public static function short($options = array())
    {

      if (isset($options['shorten'])) {
        $str = $options['str'];
        $length = isset($options['length']) ? (int) $options['length'] : 250;
        $end = isset($options['end']) ? : '…';
        if (mb_strlen($str) > $length) {
          $str = mb_substr(trim($str), 0, $length);
          $str = mb_substr($str, 0, mb_strlen($str) - mb_strpos(strrev($str), ' '));
          $str = trim($str.$end);
        }
      }

      $str = str_replace("\r\n", '<br>', e($str));
      return $str;
    }
}