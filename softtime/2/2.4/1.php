<?php
  // »звлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // –егул€рное выражение
  $pattern = "|<title>(.*)</title>|siU";

  // »звлекаем название HTML-страницы
  if(preg_match($pattern, $content, $out))
  {
    echo $out[1];
  }
?>
