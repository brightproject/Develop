<?php
  require_once("class.pager_file.php");

  // Объявляем объект постраничной навигации
  $obj = new pager_file("linux.words");

  // Выводим содержимое текущей страницы
  $arr = $obj->get_page();
  for($i = 0; $i < count($arr); $i++)
  {
    echo "{$arr[$i]}<br>";
  }

  // Выводим ссылки на другие страницы
  echo $obj;
?>
