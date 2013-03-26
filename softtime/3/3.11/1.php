<?php
  // Имя файла
  $filename = "text.txt";
  // Помещаем содержимое файла count.txt
  // в массив $lines
  $lines = file($filename);
  // Генерируем случайный индекс массива $lines
  $index = rand(0, count($lines) - 1);
  // Выводим строку номер $index
  echo $lines[$index];
?>
