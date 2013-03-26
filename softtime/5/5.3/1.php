<?php 
  // Получаем HTTP-заголовки
  $hostname = "http://www.softtime.ru/files/configs.zip";
  $out = get_content($hostname);

  // Объединяем содержимое массива в одну строку
  $lines = implode(" ",$out);
  // Определяем количество байт в закачиваемом файле
  // по регулярному выражению
  preg_match("|Content-Length:[\s]+([\d]+)|i", $lines, $matches);
  // Выводим результат
  echo "Количество байт в архиве - ".$matches[1];
?>
