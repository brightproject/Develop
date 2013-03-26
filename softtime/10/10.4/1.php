<?php
  // Устанавливаем соединение с FTP-сервером
  require_once("config.php");
  // Устанавливаем права доступа к каталогу
  ftp_chmod($link, 0755, "logs");
  // Устанавливаем права доступа к файлу
  ftp_chmod($link, 0644, "/path/file.zip");
?>
