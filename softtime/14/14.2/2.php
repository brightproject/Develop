<?php
  function get_code($hostname,$path)
  {
    $fp = fsockopen($hostname, 80, $errno, $errstr, 5); 
    // Проверяем успешность установки соединения
    if (!$fp) echo "$errstr ($errno)<br />\n"; 
    else
    { 
      // Формируем HTTP-запрос для передачи
      // его серверу
      $headers = "GET $path HTTP/1.1\r\n"; 
      $headers .= "Host: $hostname\r\n"; 
      $headers .= "Connection: Close\r\n\r\n"; 
      // Отправляем HTTP-запрос серверу
      fwrite($fp, $headers); 
      $line = fgets($fp, 1024); 
      fclose($fp); 
      return $line;
    } 
    return "none";
  }
	
  echo "<pre>";
  $hostname = "www.php.net";
  $path = "/";
  echo get_code($hostname, $path);
  $path = "/wet.php";
  echo get_code($hostname, $path);
  echo "</pre>";
?>
