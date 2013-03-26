<?php
  $hostname = "localhost";
  $path = "/test/1.php";

  // Устанавливаем соединение, имя которого
  // передано в параметре $hostname
  $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
  // Проверяем успешность установки соединения
  if (!$fp) echo "$errstr ($errno)<br />\n"; 
  else
  { 
    // Формируем HTTP-заголовки для передачи
    // его серверу
    $headers = "GET $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    // Подделываем cookie
    $headers .= "Cookie: name=cheops; admin=1;\r\n";
    $headers .= "Connection: Close\r\n\r\n"; 
    // Отправляем HTTP-запрос серверу
    fwrite($fp, $headers); 
    // Получаем ответ
    while (!feof($fp))
    { 
      $line .= fgets($fp, 1024); 
    } 
    fclose($fp); 
  } 
  echo $line;
?>
