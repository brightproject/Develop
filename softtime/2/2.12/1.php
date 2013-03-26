<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // Удаляем HTML-теги
  $content = preg_replace("|[\s]+|s", " ", strip_tags($content));

  $text = preg_split("|[\.!\?][\s]+|s", $content);
  echo "<pre>";
  print_r($text);
  echo "</pre>";
?>
