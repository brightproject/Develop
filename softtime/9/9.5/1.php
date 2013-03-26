<?php 
  // Формируем фрагменты запроса
  $query = "Форум по Apache";
  // Поисковая страница
  $url = "http://sm.aport.ru/scripts/template.dll?That=std&r=".
         urlencode($query);

  // Загружаем содержимое страницы
  $contents = file_get_contents($url); 
  // Регулярное выражение
  $pattern = "|<li value[^<]*<[^<]*<a href=\"([^\"]*)[^>]*>|is";
  // Выполняем поиск по регулярному выражению
  preg_match_all($pattern, $contents, $out, PREG_PATTERN_ORDER); 
  // Выводим результаты поиска
  for($i = 0; $i < count($out[1]); $i ++) 
  { 
    echo $out[1][$i]."<br>"; 
  } 
?>
