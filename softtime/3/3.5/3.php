<form enctype='multipart/form-data' method=post>
  <input type="file" size="32" name="filename"><br> 
  <input class=button type=submit value='Загрузить'> 
</form>
<?php
  // Обработчик формы
  if(!empty($_FILES['filename']['tmp_name']))
  {
    // Извлекаем из имени файла расширение
    $ext = strtolower(strrchr($_FILES['filename']['name'], ".")); 
    // Запрещаем загружать файлы определенного формата
    $extentions = array(".php", ".phtml", ".php", ".html", ".htm", ".pl",
                        ".xml", ".inc");
    // Проверяем, входит ли расширение файла
    // в список запрещенных файлов
    if(in_array($ext, $extentions))
    {
      $pos = strrpos($_FILES['filename']['name'], ".");
      $path = substr($_FILES['filename']['name'], 0, $pos).".txt"; 
    }
    else
    {
      $path = $_FILES['filename']['name'];
    }
    // Сохраняем файл в текущем каталоге
    if(copy($_FILES['filename']['tmp_name'], $path))
    {
      echo "Файл успешно загружен - <a href=$path>$path</a>";
    }
  }
?>
