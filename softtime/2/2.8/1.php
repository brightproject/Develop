<?php
  // ��������� ���������� �� ����� text.txt
  $content = file_get_contents("text.txt");
  $content = nl2br($content);

  // ���������� ���������
  $pattern = "#http://[-a-z0-9\.]+([-a-z0-9]+\.(html|php|pl|cgi))?".
             "([-a-z0-9_:@&\?=+\.!/~*'%$]+)?#i";
  $replacement = "<a href=\\0>\\0</a>";

  // ��������� �������� HTML-��������
  echo preg_replace($pattern, $replacement, $content);
?>
