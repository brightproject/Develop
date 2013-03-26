<?php
  // Подключаем реализацию класса
  require_once("class.cls.php");
  // Устанавливаем соединение
  require_once("config.php");

  // Создаем объект
  $obj = new cls(100);

  // Сериализуем объект
  $object = serialize($obj);
  // Экранируем специальные символы
  $object = mysql_real_escape_string($object);

  // Сохраняем объект в таблице базы данных
  $query = "INSERT INTO object VALUES (NULL, '$object')";
  if(!mysql_query($query)) exit("Ошибка сохранения 
                                 объекта в базе данных");
  else echo "Объект успешно сохранен в базе данных";
?>
