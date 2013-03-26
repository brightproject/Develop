<?php
  // Ссылка на XML-файл
  $url = "http://img.lenta.ru/r/EX/import.rss";
  // Загружаем файл
  $content = file_get_contents($url);
  // Регулярное выражение
  $pattern = "|<item>[\s]*<title>(.*?)</title>[\s]*".
             "<link>(.*?)</link>[\s]*".
             "<description>(.*?)</description>[\s]*".
             "<pubDate>(.*?)</pubDate>[\s]*".
             "<category>(.*?)</category>|is";
  preg_match_all($pattern, $content, $out);
  // Выводим последние 10 позиций
  for($i = 0; $i < 10; $i++)
  {
    echo "<a href={$out[2][$i]}>{$out[1][$i]}</a><br>".
         "{$out[3][$i]}<br><br>";
  }
?>
