<?php
  // Устанавливаем соединение с FTP-сервером
  require_once("config.php");
  // Инициируем загрузку файла на FTP-сервер
  $ret = ftp_nb_put($link, "/path/file.zip", "C:\\file.zip", FTP_BINARY);
  // Цикл загрузки
  while ($ret == FTP_MOREDATA)
  {
    // Выводим точки, чтобы пользователь
    // знал, что процесс идет
    echo ".";
    // Продолжаем загрузку
    $ret = ftp_nb_continue($link);
  }
  if ($ret != FTP_FINISHED)
     exit ("<br>Во время загрузки файла произошла ошибка...");
?>
