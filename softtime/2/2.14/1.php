<?php
  // Извлекаем содержимое из файла bb.txt
  $content = file_get_contents("bb.txt");

  // Осуществляем замену [i] и [/i] на <i> и </i>
  $content = preg_replace("#\[i\](.+)\[\/i\]#isU",'<i>\\1</i>',$content);
  // Осуществляем замену [b] и [/b] на <b> и </b>
  $content = preg_replace("#\[b\](.+)\[\/b\]#isU",'<b>\\1</b>',$content);
  // Осуществляем замену [code] и [/code] на <code><pre> и </pre></code>
  $content = preg_replace("#\[code\](.+)\[\/code\]#isU",
                          '<code><pre>\\1</pre></code>',
                          $content);
  // Осуществляем обработку тега [url]ссылка[/url]
  $content = preg_replace("#\[url\][\s]*([\S]*)[\s]*\[\/url\]#isU",
                          '<a href="\\1" target=_blank>\\1</a>',
                          $content);
  // Осуществляем обработку тега [url = ссылка]название ссылки[/url]
  $content = preg_replace("#\[url[\s]*=[\s]*([\S]+)[\s]*\][\s]*([^\[]*)\[/url\]#isU",
                          '<a href="\\1" target=_blank>\\2</a>',
                          $content);

  echo nl2br($content);
?>
