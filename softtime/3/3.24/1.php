<?php
  // Рекурсивная функция удаления каталога
  // с произвольной степенью вложенности
  function full_del_dir($directory)
  {
    $dir = opendir($directory);
    while(($file = readdir($dir)))
    {
      // Если функция readdir() вернула файл - удаляем его
      if(is_file("$directory/$file")) unlink("$directory/$file");
      // Если функция readdir() вернула каталог и он
      // не равен текущему или родительскому - осуществляем
      // рекурсивный вызов full_del_dir() для этого каталога
      else if (is_dir("$directory/$file") &&
               $file != "." &&
               $file != "..")
      {
        full_del_dir("$directory/$file");  
      }
   }
   closedir($dir);
   rmdir($directory);
   echo("Каталог успешно удален");
  }
  
  // Удаляем каталог temp
  full_del_dir("temp");
?> 
