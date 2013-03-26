<?php
  // Подключаем вспомогательные файлы
  require_once("function.copy_ftp_list.php");

  // Сервер назначения
  $ftp_handle_to = ftp_connect("XXX.XXX.XXX.XXX");
  if (!$ftp_handle_to)
  {
    exit(" Ошибка соединения c FTP-сервером назначения");
  }

  // Сервер-источник
  $ftp_handle_from = ftp_connect("XXX.XXX.XXX.XXX");
  if (!$ftp_handle_from)
  {
    exit(" Ошибка соединения c FTP-сервером источником");
  }

  // Копируем файлы с одного сервера на другой
  copy_ftp_list("/", "/", $ftp_handle_to, $ftp_handle_from);
?>
