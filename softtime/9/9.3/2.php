<?php
  // Вспомогательные функции
  require_once("include.win_utf8.php");
  require_once("include.get_content.php");
  // Формируем фрагменты запроса
  $hostname = "www.google.ru";
  $button = "Поиск";
  $query = "Форум по регулярным выражениям";
  $path = "/search?hl=ru&q=".win_utf8($query).
          "&btnG=".win_utf8($button)."&lr=";

  // Снимаем ограничение на время выполнения скрипта
  set_time_limit(0);
  // Вызываем функцию, которая загружает страницу
  $contents = get_content($hostname, $path);

  // Регулярное выражение
  $pattern = '|<p class=g><a href=\"([^\"]*)[^>]*>|is'; 

  // Выполняем поиск по регулярному выражению
  preg_match_all($pattern, $contents, $out, PREG_PATTERN_ORDER); 
  // Выводим результаты поиска
  for($i = 0; $i < count($out[1]); $i ++) 
  { 
    echo $out[1][$i]."<br>"; 
  }
?>
