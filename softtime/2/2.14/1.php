<?php
  // ��������� ���������� �� ����� bb.txt
  $content = file_get_contents("bb.txt");

  // ������������ ������ [i] � [/i] �� <i> � </i>
  $content = preg_replace("#\[i\](.+)\[\/i\]#isU",'<i>\\1</i>',$content);
  // ������������ ������ [b] � [/b] �� <b> � </b>
  $content = preg_replace("#\[b\](.+)\[\/b\]#isU",'<b>\\1</b>',$content);
  // ������������ ������ [code] � [/code] �� <code><pre> � </pre></code>
  $content = preg_replace("#\[code\](.+)\[\/code\]#isU",
                          '<code><pre>\\1</pre></code>',
                          $content);
  // ������������ ��������� ���� [url]������[/url]
  $content = preg_replace("#\[url\][\s]*([\S]*)[\s]*\[\/url\]#isU",
                          '<a href="\\1" target=_blank>\\1</a>',
                          $content);
  // ������������ ��������� ���� [url = ������]�������� ������[/url]
  $content = preg_replace("#\[url[\s]*=[\s]*([\S]+)[\s]*\][\s]*([^\[]*)\[/url\]#isU",
                          '<a href="\\1" target=_blank>\\2</a>',
                          $content);

  echo nl2br($content);
?>
