<?php
  // ��������� ���������� �� ����� index.htm
  $content = file_get_contents("index.htm");

  // ���������� ���������
  $pattern = "|<title>(.*)</title>|siU";

  // ��������� �������� HTML-��������
  if(preg_match($pattern, $content, $out))
  {
    echo $out[1];
  }
?>
