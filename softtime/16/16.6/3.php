<?php
  // Читаем содержимое файла archive.tar
  // в переменную $content
  $content = file_get_contents("archive.tar");
  // Открываем файл archive.tar.gz
  $zf = gzopen("archive.tar.gz", "w9");
  // Записываем сжатый файл
  gzwrite($zf, $content);
  // Закрываем файл
  gzclose($zf);
?>
