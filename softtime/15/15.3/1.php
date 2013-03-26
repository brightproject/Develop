<?php
  // Имя каталога
  $dirname = "img";
  // Открываем каталог
  $dir = opendir($dirname);

  echo "<table border=1>";
  echo "<tr>
          <td>Файл</td>
          <td>Ширина</td>
          <td>Высота</td>
        </tr>";

  // Читаем содержимое каталога
  while(($file = readdir($dir)) !== false)
  {
    // Если перед нами файл - определяем
    // его параметры и выводим строку таблицы
    if(is_file("$dirname/$file"))
    {
      list($width, $height) = getimagesize("$dirname/$file");
      echo "<tr>
              <td>$file</td>
              <td>$width</td>
              <td>$height</td>
            </tr>";
    }
  }

  echo "</table>";

  // Закрываем каталог
  closedir($dir);
?>
