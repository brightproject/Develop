<?php 
  // Формируем фрагменты запроса
  $button = "Поиск";
  $query = "Форум по MySQL";
  // Поисковая страница
  $url = "http://www.rambler.ru/srch?set=www&words=".
         urlencode(convert_cyr_string($query,"w","k")).
         "&btnG=".urlencode(convert_cyr_string($button,"w","k"));

  // Загружаем содержимое страницы
  $contents = file_get_contents($url); 
  // Регулярное выражение
  $pattern = 
         "|<li>[^>]+><a [^ ]+ [^ ]+ href=\"([^\"]+)\"[^>]+>(.+)</a>|isU";
  // Выполняем поиск по регулярному выражению
  preg_match_all($pattern, $contents, $out, PREG_PATTERN_ORDER); 
  // Выводим результаты поиска
  for($i = 0; $i < count($out[1]); $i ++) 
  { 
    echo "<a href=".$out[1][$i].">".$out[2][$i]."</a><br>"; 
  } 
?>
