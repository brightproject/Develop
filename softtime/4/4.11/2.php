<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Проверяем, передан ли параметр id_mp3
  // и является ли он целым числом, чтобы
  // предотвратить SQL-инъекцию
  if(!preg_match("|^[\d]+$|",$_GET['id_mp3']))
  {
    exit("Недопустимый формат URL-запроса");
  }

  // Извлекаем MP3-файл из базы данных
  $query = "SELECT * FROM mp3 
            WHERE id_mp3 = $_GET[id_mp3]";
  $mp3 = mysql_query($query);
  if(!$mp3) exit(mysql_error());
  $file = mysql_fetch_array($mp3);

  // Устнавливаем имя загружаемого файла
  header("Content-Disposition: attachment; filename=$file[name]"); 
  // Отсылаем заголовки на загрузку файла
  header("Content-type: application/octet-stream");
  // Отправляем файл пользователю
  echo $file['content'];
?>
