<?php
  // Тема письма
  $theme = "Тема письма";
  // Содержимое письма
  $body = "Тело письма";
  // Имя файла с e-mail адресами
  $filename = "mail.txt";
  // Читаем содержимое файла в массив $listemail
  // при помощи функции file()
  $listemail = file($filename);
  // В цикле формируем почтовые заголовки
  $header = "";
  foreach($listemail as $email)
  {
    $header .= "Bcc: ".trim($email)."\r\n";
  }
  $header .= "\r\n";
  mail(trim($listemail[0]), $theme, $body, $header);
?>
