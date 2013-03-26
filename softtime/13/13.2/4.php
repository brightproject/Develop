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

  $obj = new cls();
  echo cls::$count."<br>"; // 1

  for($i = 0; $i < 3; $i++)
  {
    $arr[] = new cls();
    echo cls::$count."<br>"; // 2, 3, 4
  }

  // ”ничтожаем массив объектов
  unset($arr);

  echo cls::$count."<br>"; // 1
?>
