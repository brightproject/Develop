<?php 
  $bufer = ""; 
  for($i=0; $i<100000; ++$i) 
  { 
    // Генерируем имя файла
    $filename = "site.tm".$i; 
    // Если такой файл существует,
    // добавляем его содержимое к $bufer
    if(file_exists($filename)) 
    { 
      $fp = fopen($filename,"r"); 
      $bufer .= fread($fp,filesize($filename)); 
      fclose($fp); 
    } 
    else 
    { 
      // Если файл с таким именем не 
      // существует - выходим из цикла 
      break; 
    } 
    // Склеенные в переменной $bufer 
    // части помещаем в конечный файл 
    $fp = fopen("site_final.rar","w"); 
    fwrite($fp, $bufer); 
    fclose($fp); 
  } 
?>
