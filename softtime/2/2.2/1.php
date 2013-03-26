<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // Регулярное выражение
  $search = "|<img[^>]+>|si";
  // Замена
  $replace = "";

  // Осуществляем удаление тегов и вывод текста в окно браузера
  echo preg_replace($search, $replace, $content);
?>
