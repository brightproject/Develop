<?php
  function my_long2ip($long)
  {
    for($i = 0; $i < 4; $i++)
    {
      $arr[$i] = $long % 256;
      $long = $long /256;
    }
    // Сортируем массив по ключам в обратном порядке
    krsort($arr);
    return implode(".", $arr);
  }
?>
