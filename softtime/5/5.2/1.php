<?php 
  // Функция получения HTTP-заголовков 
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
      // Формируем HTTP-запрос для передачи
      // его серверу
      $headers = "GET $path HTTP/1.1\r\n"; 
      $headers .= "Host: $hostname\r\n"; 
      $headers .= "Connection: Close\r\n\r\n"; 
      // Отправляем HTTP-запрос серверу
      fwrite($fp, $headers); 
      $end = $false;
      // Получаем ответ
      while (!$end)
      { 
        $line = fgets($fp, 1024); 
        if (trim($line) == "") $end = true; 
        else $out[] = $line;
      } 
      fclose($fp); 
    } 
    return $out; 
  }
  $hostname = "www.php.net";
  $path = "/";
  // Устанавливаем большее время работы
  // скрипта - пока вся страница не будет загружена,
  // она не будет отображена
  set_time_limit(180);
  // Вызываем функцию
  $out = get_content($hostname, $path);
  // Выводим содержимое массива
  echo "<pre>";
  print_r($out);
  echo "</pre>";
?>
