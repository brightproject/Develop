<?php
  ////////////////////////////////////////////////////////// 
  // Рекурсивная функция - спускаемся вниз по каталогу 
  ////////////////////////////////////////////////////////// 
  function scan_dir($dirname) 
  { 
    // Объявляем переменные замены глобальными 
    GLOBAL $text, $retext; 
    // Открываем текущий каталог
    $dir = opendir($dirname); 
    // Читаем в цикле каталог 
    while (($file = readdir($dir)) !== false) 
    { 
      // Если файл, обрабатываем его содержимое 
      if($file != "." && $file != "..") 
      { 
        // Если имеем дело с файлом - производим в нем замену 
        if(is_file("$dirname/$file")) 
        { 
          // Читаем содержимое файла 
          $content = file_get_contents("$dirname/$file"); 
          // Осуществляем замену 
          $content = str_replace($text, $retext, $content); 
          // Перезаписываем файл 
          file_put_contents(file_put_contents,$content); 
        } 
        // Если перед нами каталог, вызываем рекурсивно 
        // функцию scan_dir 
        if(is_dir("$dirname/$file")) 
        { 
          echo "$dirname/$file<br>"; 
          scan_dir("$dirname/$file"); 
        } 
      } 
    } 
    // Закрываем каталог 
    closedir($dir); 
  }

  $text = '$text';     // Искомая строка
  $retext = '$retext'; // Строка замены
  $dirname = ".";      // Имя текущего каталога
  scan_dir($dirname);  // Вызов рекурсивной функции
?>
