<?php
  // Функция, загружающая страницу при помощи сокетов
  function get_content($hostname, $path)
  { 
    $line = "";
    // Устанавливаем соединение, имя которого
    // передано в параметре $hostname
    $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
    // Проверяем успешность установки соединения
    if (!$fp) echo "$errstr ($errno)<br />\n"; 
    else
    { 
      // Формируем HTTP-заголовки для передачи
      // ихсерверу
      $headers = "GET $path HTTP/1.1\r\n"; 
      $headers .= "Host: $hostname\r\n"; 
      // Подделываем пользовательский агент, маскируясь
      // под пользователя Windows XP
      $headers .= "User-Agent: Mozilla/4.0 ".
                  "(compatible; MSIE 6.0; Windows NT 5.1\r\n"; 
      // Подделываем реферер, сообщая серверу, что мы повторно
      // нажимаем кнопку "Поиск"
      $headers .= "Referer: http://".$hostname.$path."\r\n"; 
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
    return $line; 
  }
?>