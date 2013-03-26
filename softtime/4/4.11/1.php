<form enctype='multipart/form-data' method=post>
<input type="file" name="mp3"><br>
<input type=submit value='Загрузить'>
</form>
<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Обработчик HTML-формы
  if(!empty($_FILES))
  {
    // Проверяем, является ли переданный файл mp3-файлом
    if($_FILES['mp3']['type'] == 'audio/mpeg')
    {
      // Читаем содержимое файла
      $content = file_get_contents($_FILES['mp3']['tmp_name']);
      // Уничтожаем файл во временном каталоге
      unlink($_FILES['mp3']['tmp_name']);

      // Экранируем спецсимволы в двоичном содержимом файла
      $content = mysql_escape_string($content);

      // Формируем запрос на добавление файла в таблицу
      $query = "INSERT INTO mp3 VALUES
                (NULL, '".$_FILES['mp3']['name']."', '$content')";
      if(mysql_query($query))
      {
        // Осуществляем автоматическую перезагрузку страницы
        // для очистки POST-данных
        echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
             </HEAD></HTML>";
      } else exit(mysql_error());
    }
  }

  // Выводим список файлов
  $query = "SELECT * FROM mp3";
  $mp = mysql_query($query);
  if(!$mp) exit(mysql_error());
  // Если имеется хотя бы одна запись,
  // выводим  
  if(mysql_num_rows($mp) > 0)
  {
    while($mp3 = mysql_fetch_array($mp))
    {
      echo "<a href=get.php?id_mp3=$mp3[id_mp3]>$mp3[name]</a><br>";
    }
  }
?>
