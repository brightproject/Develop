<?php 
  // Имя файла 
  $filename = "site.rar"; 
  // Разбиваем файл на части по 10 000 байт
  $piece = 10000; 
  // Открываем исходный файл для чтения 
  $fp = fopen($filename, "r"); 
  // Читаем содержимое файла в буфер 
  $bufer = fread($fp, filesize($filename)); 
  // Закрываем файл 
  fclose($fp); 
  // Подсчитываем количество частей, на которые необходимо разбить файл 
  $count = (int)filesize($filename)/$piece; 
  if((float)(filesize($filename)/$piece) - $count != 0) $count++; 
  // В цикле разбиваем содержимое файла в переменной 
  // $bufer на части 
  for($i=0; $i<$count; ++$i) 
  { 
    $part = substr($bufer,$i*$piece,$piece); 
    // Сохраняем текущую часть в отдельном файле 
    $fp = fopen("site.tm".$i,"w"); 
    fwrite($fp,$part); 
    fclose($fp); 
  } 
?>
