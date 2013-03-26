<?php
  // Адрес FTP-сервера
  $ftp_server = "ftp.server.ru";
  // Пользователь
  $ftp_user = "user";
  // Пароль
  $ftp_password = "password";
  // Устанавливаем время исполнения скрипта 120 с
  set_time_limit(120);
  // Пытаемся установить соединение с FTP-сервером 
  $link = ftp_connect($ftp_server); 
  if(!$link) exit("К сожалению, не удается установить 
                   соединение с FTP-сервером $ftp_server");
  // Осуществляем регистрацию на сервере
  $login = ftp_login($link, $ftp_user, $ftp_password);
  //$login = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
  if(!$login) exit("К сожалению, не удается зарегистрироваться на
            сервере. Проверьте регистрационные данные.");
?>
