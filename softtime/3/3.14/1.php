<?php
  // Имя файла
  $filename = "text.txt";
  $str = "Программирование на Visual Basic";

  // Определяем максимальный номер индекса
  // Читаем содержимое файла
  $arr = file($filename);
  $maxval = 0;
  foreach($arr as $line)
  {
    preg_match("|^([\d]+)([^\n]+)$|",$line,$out);
    if($maxval < $out[1]) $maxval = $out[1];
  }

  // Извлекаем содержимое файла
  $content = file_get_contents($filename);
  // Добавляем к содержимому новую строку
  $content .= "\n".($maxval + 1)." ".$str;

  // Сохраняем результат в файле
  $fd = fopen($filename, "w");
  fwrite($fd, $content);
  fclose($fd);
?>
