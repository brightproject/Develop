<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // Удаляем HTML-теги
  $content = preg_replace("|[\s]+|s", " ", strip_tags($content));

  // Подсчитываем количество односимвольных слов
  preg_match_all("|\b[\w]{1}\b|s", $content, $out, PREG_PATTERN_ORDER);
  // Выводим результат
  echo "Количество односимвольных слов - ".count($out[0])."<br>";
  echo "<pre>";
  print_r($out[0]);
  echo "</pre>";
?>
