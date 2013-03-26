<?php 
  // Устанавливаем соединение с базой данных
  include "config.php";
  // Имя файла с SQL-инструкциями 
  $filename = "catalog.sql"; 
  // открываем его и читаем в буфер 
  $fp = fopen($filename, "r"); 
  $contents = fread($fp,filesize($filename)); 
  fclose($fp); 
  // Разбиваем содержимое файла по точке с запятой 
  $quer = preg_split("#;[\s]*\r\n)#is", $contents); 
  // Выполняем SQL-запросы 
  foreach($quer as $query) 
  { 
    if(!mysql_query($query)) exit(mysql_error()); 
  } 
?>
