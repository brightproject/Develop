<?php
echo getlinecount($_GET['name']);

function getlinecount($filename)
{
  // Проверяем, существует ли файл
  if(!file_exists($filename)) return "файл не существует";
  // Разбиваем содержимое массива на отдельные строки
  // при помощи функции file(), которая возвращает массив,
  // каждый элемент которого содержит строку файла
  $filearr = file($filename);
  // Возвращаем количество строк в файле
  return count($filearr);
}
?>
