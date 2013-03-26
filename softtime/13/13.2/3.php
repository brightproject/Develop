<?php
  class cls
  {
    public $var;
    public static $count = 0;

    public function __construct()
    {
      cls::$count++;
    }
    public function __destruct()
    {
      cls::$count--;
    }
  }
?>
