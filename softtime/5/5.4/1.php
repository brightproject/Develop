<?php 
  $hostname = "localhost";
  $path = "/puzzles/handler.php";
  $line = "";
  // Устанавливаем соединение, имя которого
  // передано в параметре $hostname
  $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
  // Проверяем успешность установки соединения
  if (!$fp) echo "$errstr ($errno)<br />\n"; 
  else
  { 
    // Данные HTTP-запроса
    $data = 
      "name=".urlencode("Игорь")."&pass=".urlencode("пароль")."\r\n\r\n";
    // Заголовок HTTP-запроса
    $headers = "POST $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    $headers .= "Content-type: application/x-www-form-urlencoded\r\n";
    $headers .= "Content-Length: ".strlen($data)."\r\n\r\n";
    // Отправляем HTTP-запрос серверу
    fwrite($fp, $headers.$data); 
    // Получаем ответ
    while (!feof($fp))
    { 
      $line .= fgets($fp, 1024); 
    } 
    fclose($fp); 
  } 
  echo $line;
?>
