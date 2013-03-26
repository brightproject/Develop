<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // Удаляем HTML-теги
  $content = preg_replace("|[\s]+|s", " ", strip_tags($content));

  $text = preg_split("|[\.!\?][\s]+|s", $content);

  for($i = 0; $i < count($text); $i++)
  {
    $text[$i] = preg_split("|[-\s,]+|s", $text[$i]);
  }
  echo "<pre>";
  print_r($text);
  echo "</pre>";
?>
