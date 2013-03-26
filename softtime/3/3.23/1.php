<?php 
  // Копируем содержимое каталога home в home2 
  lowering("home","home2"); 
  ////////////////////////////////////////////////////////// 
  // Рекурсивная функция спуска 
  ////////////////////////////////////////////////////////// 
  function lowering($dirname,$dirdestination) 
  { 
    // Открываем каталог 
    $dir = opendir($dirname); 
    // В цикле выводим его содержимое 
    while (($file = readdir($dir)) !== false) 
    { 
      echo $file."<br>"; 
      if(is_file("$dirname/$file")) 
      { 
        copy("$dirname/$file.", "$dirdestination/$file"); 
      } 
      // Если это каталог - создаем его 
      if(is_dir("$dirname/$file") && 
         $file != "." && 
         $file != "..") 
      { 
        // Создаем каталог 
        if(!mkdir($dirdestination."/".$file)) 
        { 
          echo "Невозможно создать каталог $dirdestination/$file"; 
        } 
        // Вызываем рекурсивно функцию lowering 
        lowering("$dirname/$file", "$dirdestination/$file"); 
      } 
    } 
    // Закрываем каталог 
    closedir($dir); 
  } 
?>
