<?php
  // Устанавливаем соединение с FTP-сервером
  require_once("config.php");
  // Получаем все файлы корневого каталога
  $file_list = ftp_rawlist($link, "/");
  // Выводим массив $file_list
  foreach($file_list as $line) echo $line."<br>";
?>
