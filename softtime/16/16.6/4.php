<?php
  // Читаем содержимое файла archive.tar.gz
  // в массив $arr, каждый элемент которого
  // соответствует одной строке исходного файла
  // archive.tar
  $arr = gzfile("archive.tar.gz");
  // Сохраняем временную переменную $content
  // в файл archive.tar
  $fd = fopen("archive.tar","w");
  fwrite($fd, implode("",$arr));
  fclose($fd);
?>
