<?php
  // Загружаем страницу с удаленного хоста
  $content = file_get_contents("http://www.softtime.ru/");
  // Сохраняем содержимое страницы в файле
  $fd = fopen("url.txt","w");
  fwrite($fd,$content);
  fclose($fd);
?>
