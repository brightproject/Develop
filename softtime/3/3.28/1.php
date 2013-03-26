<?php 
  // Извлекаем содержимое файла 
  $filename = 'имя_файла'; 
  // Помещаем содержимое файла в переменную $content
  $content = file_get_contents($filename); 
  // Извлекаем дату 
  preg_match('|([\d]{4}:[\d]{2}:[\d]{2} [\d]{2}:[\d]{2}:[\d]{2})|i',
             $content, 
             $out); 
  echo $out[0]; 
?>
