<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");
  // Осуществляем удаление тегов и вывод текста в окно браузера
  echo strip_tags($content);
?>
