<?php
  // Ищем строку с индексом 7
  $index = 7;
  // Имя файла
  $filename = "text.txt";
  // Открываем файл для чтения
  $fd = fopen($filename, "r");
  // Читаем содержимое файла
  $bufer = fread($fd, filesize($filename));
  // Закрываем файл
  fclose($fd);
  // Находим строку с индексом $index
  $bufer = preg_replace("|$index ([^\n]*)|",
                        "$index Программирование на C/C++",
                        $bufer);
  // Сохраняем результат в файле
  $fd = fopen($filename, "w");
  fwrite($fd, $bufer);
  fclose($fd);
?>
