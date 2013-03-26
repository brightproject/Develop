<?php
  // Устанавливаем соединение с FTP-сервером
  require_once("config.php");

  // Выводим размер файлов на FTP-сервере
  echo get_ftp_size($link, "/");
?>
