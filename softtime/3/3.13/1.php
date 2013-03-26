<?php
  // Имя файла
  $filename = "text.txt";
  // Читаем содержимое файла
  $lines = file($filename);
  // Перемешиваем записи случайным образом
  shuffle($lines);
  // Удаляем все пробельные символы
  // в конце строк
  array_walk($lines, 'trim_array');
  // Сохраняем результат в файле
  $fd = fopen($filename, "w");
  fwrite($fd, implode("\r\n", $lines));
  fclose($fd);

  function trim_array(&$item, $key)
  {
    $item = trim($item);
  }
?> 
