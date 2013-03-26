<?php
  // Устанавливаем соединение с FTP-сервером
  require_once("config.php");
  // Изменяем текущий каталог
  ftp_chdir($link, "logs");
?>
