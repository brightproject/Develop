<?php
  // Вспомогательные функции
  require_once("include.win_utf8.php");
  require_once("include.get_content.php");

  // Формируем фрагменты запроса
  $hostname = "www.google.ru";
  $button = "Поиск";
  $query = "Форум по регулярным выражениям";
  $path = 
   "/search?hl=ru&q=".win_utf8($query)."&btnG=".win_utf8($button)."&lr=";

  // Снимаем ограничение на время выполнения скрипта
  set_time_limit(0);
  // Вызываем функцию, которая загружает страницу
  echo get_content($hostname, $path);
?>
