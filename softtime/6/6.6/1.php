<?php
  $hostname = "localhost";
  $path = "/test/index.php";

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
    $headers .= "Connection: Close\r\n\r\n"; 
    // Отправляем HTTP-запрос серверу
    fwrite($fp, $headers); 
    // Получаем ответ
    while (!feof($fp))
    { 
      $line = fgets($fp, 1024); 
      // Ищем строку вида 
      // Set-Cookie: PHPSESSID=6197e647566bdaa24da3ab42ae7604b2;
      // Именно она устанавливает cookie
      preg_match("|Set-Cookie: PHPSESSID=([\d\w]+);|i",$line,$out);
      if(!empty($out[1]))
      {
        $SID = $out[1];
        break;
      }
    } 
    fclose($fp); 
  } 

  $hostname = "localhost";
  $path = "/test/handler.php";
  $line = "";

  // Передаем методом POST имя пользователя (admin),
  // его пароль (admin), скрытое поле session_id ($SID)
  // В заголовках передаем cookie PHPSESSID
  // Устанавливаем соединение, имя которого
  // передано в параметре $hostname
  $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
  // Проверяем успешность установки соединения
  if (!$fp) echo "$errstr ($errno)<br />\n"; 
  else
  { 
    // Данные POST-запроса
    $data = "name=admin&pass=admin&session_id=$SID&\r\n\r\n";
    // Формируем HTTP-заголовки для передачи
    // его серверу
    $headers = "POST $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    $headers .= "Content-type: application/x-www-form-urlencoded\r\n";
    $headers .= "Content-Length: ".strlen($data)."\r\n";
    // Подделываем cookie
    $headers .= "Cookie: PHPSESSID=$SID;\r\n";
    $headers .= "Connection: Close\r\n\r\n"; 
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
