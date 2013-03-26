<?php
  // Рекурсивная функция удаления каталога
  // с произвольной степенью вложенности
  function size_dir($directory, $size = 0)
  {
    $dir = opendir($directory);
    while(($file = readdir($dir)))
    {
      // Если функция readdir() вернула файл - учитываем его размер
      if(is_file("$directory/$file"))
      {
        $size += filesize("$directory/$file");
      }
      // Если функция readdir() вернула каталог и он
      // не равен текущему или родительскому - осуществляем
      // рекурсивный вызов full_del_dir() для этого каталога
      else if (is_dir("$directory/$file") &&
               $file != "." &&
               $file != "..")
      {
        size_dir("$directory/$file", $size);  
      }
   }
   closedir($dir);

   return $size;
  }

  // Подсчитываем объем текущего каталога
  echo size_dir(".");
?>
