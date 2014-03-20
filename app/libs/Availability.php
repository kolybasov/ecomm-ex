<?php

class Availability {

  public static function display($availability) {
    if($availability == 0) {
      echo "Товар відсутній";
    } else if($availability == 1) {
      echo "Є в наявності";
    }
  }

  public static function displayClass($availability) {
    if($availability == 0) {
      echo "outofstock";
    } else if($availability == 1) {
      echo "instock";
    }
  }

}