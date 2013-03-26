<?php
  // Получаем дескриптор удаленной страницы
  $fd = fopen("http://www.softtime.ru/", "r");
  if(!$fd) exit("Запрашиваемая страница не найдена");
  $content = "";
  // Чтение содержимого файла в переменную $content
  while (!feof ($fd))
  {
    $content .= fgets($fd, 1024);
  }
  // Закрыть открытый указатель файла
  fclose ($fd);   

  // Сохраняем содержимое страницы в файле
  $fd = fopen("url.txt", "w");
  fwrite($fd, $content);
  fclose($fd);
?>
