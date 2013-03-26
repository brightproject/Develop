<?php
  // Подключаем реализацию класса
  require_once("class.cls.php");
  // Устанавливаем соединение
  require_once("config.php");

  // Извлекаем объект с идентификатором, 
  // равным 1, из таблицы object
  $query = "SELECT * FROM object WHERE id_object = 1";
  $obj = mysql_query($query);
  if(!$obj) exit("Ошибка извлечения объекта из таблицы");
  // Если запись присутствует - обрабатываем ее
  if(mysql_num_rows($obj))
  {
    $table = mysql_fetch_array($obj);
    // Восстанавливаем объект
    $object = unserialize($table['object']);
    // Выводим дамп объекта
    echo "<pre>";
    print_r($object);
    echo "</pre>";
  }
?>
