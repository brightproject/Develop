<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // Удаляем HTML-теги
  $content = preg_replace("|[\s]+|s", " ", strip_tags($content));

  for($i = 1; $i <= 10; $i++)
  {
    // Подсчитываем количество односимвольных слов
    preg_match_all("|\b[\w]{".$i."}\b|s",
                   $content, 
                   $out, 
                   PREG_PATTERN_ORDER);
    echo "Количество слов c $i символами - ".count($out[0])."<br>";
  }
?>
