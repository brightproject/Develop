<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Проверяем, передан ли параметр id_image
  // и является ли он целым числом, чтобы
  // предотвратить SQL-инъекцию
  if(!preg_match("|^[\d]+$|",$_GET['id_image']))
  {
    exit("Недопустимый формат URL-запроса");
  }

  // Извлекаем графический файл из базы данных
  $query = "SELECT * FROM image
            WHERE id_image = $_GET[id_image]";
  $img = mysql_query($query);
  if(!$img) exit(mysql_error());
  $image = mysql_fetch_array($img);

  // Отсылаем заголовки на загрузку файла
  header("Content-type: image/*");
  // Отправляем файл пользователю
  echo $image['content'];
?>
