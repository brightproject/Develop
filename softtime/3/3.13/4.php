<?php
  // Имя файла
  $filename = "text.txt";
  // Открываем файл для чтения
  $fd = fopen($filename, "r");
  // Читаем содержимое файла
  $bufer = fread($fd, filesize($filename));
  // Закрываем файл
  fclose($fd);
  // Находим все строки при помощи регулярного выражения
  preg_match_all("#([\d]+) ([^\n]+)(\n|$)#U",
                 $bufer, 
                 $out,
                 PREG_PATTERN_ORDER);
  // Формируем промежуточный массив
  for($i = 0; $i < count($out[1]); $i++)
  {
    $temp[$out[1][$i]] = trim($out[2][$i]);
  }
  // Сортируем массив
  asort($temp);
  // Формируем конечный массив
  foreach($temp as $key => $value)
  {
    $line[] = $key." ".$value;
  }
  // Сохраняем результат в файле
  $fd = fopen($filename, "w");
  fwrite($fd, implode("\r\n", $line));
  fclose($fd);
?>
