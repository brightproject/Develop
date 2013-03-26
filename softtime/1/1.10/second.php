<?php
  // Извлекаем упакованный массив 
  // из cookie
  $filename = unserialize(stripcslashes($_COOKIE['filename']));
  // Выводим содержимое массива
  echo "<pre>";
  print_r($filename);
  echo "</pre>";
?>
