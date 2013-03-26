<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php");
  // Подключаем класс постраничной навигации
  require_once("class.pager_mysql.php");

  // Объявляем объект постраничной навигации
  $obj = new pager_mysql("position",
                         "",
                         "ORDER BY name");

  // Выводим содержимое текущей страницы
  $arr = $obj->get_page();
  for($i = 0; $i < count($arr); $i++)
  {
    echo "<a href=position.php?id={$arr[$i][id_postion]}>".
         "{$arr[$i][name]}</a><br>";
  }

  // Выводим ссылки на другие страницы
  echo $obj;
?>
