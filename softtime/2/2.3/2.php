<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // Удаляем HTML-теги
  $content = strip_tags($content);

  // Регулярное выражение
  $pattern = "|[ \f\t\v]+|s";

  // Заменяем несколько пробельных символов
  // одним, не затрагивая переводы строк
  echo preg_replace($pattern, " ", $content);
?>
