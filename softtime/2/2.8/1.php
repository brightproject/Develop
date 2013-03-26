<?php
  // »звлекаем содержимое из файла text.txt
  $content = file_get_contents("text.txt");
  $content = nl2br($content);

  // –егул€рное выражение
  $pattern = "#http://[-a-z0-9\.]+([-a-z0-9]+\.(html|php|pl|cgi))?".
             "([-a-z0-9_:@&\?=+\.!/~*'%$]+)?#i";
  $replacement = "<a href=\\0>\\0</a>";

  // »звлекаем название HTML-страницы
  echo preg_replace($pattern, $replacement, $content);
?>
