<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // Удаляем HTML-теги
  $content = strip_tags($content);

  // Регулярное выражение
  $pattern = "|[\s]+|s";

  // Заменяем несколько пробельных символов
  // одним
  echo preg_replace($pattern, " ", $content);
?>
