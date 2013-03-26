<?php
  // ”станавливаем соединение с FTP-сервером
  require_once("config.php");
  // ¬ыводим тип операционной системы FTP-сервера
  echo ftp_systype($link);
?>
