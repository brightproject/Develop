<?php
  // ��������� ���������� �� ����� index.htm
  $content = file_get_contents("index.htm");

  // ������� HTML-����
  $content = preg_replace("|[\s]+|s", " ", strip_tags($content));

  for($i = 1; $i <= 10; $i++)
  {
    // ������������ ���������� �������������� ����
    preg_match_all("|\b[\w]{".$i."}\b|s",
                   $content, 
                   $out, 
                   PREG_PATTERN_ORDER);
    echo "���������� ���� c $i ��������� - ".count($out[0])."<br>";
  }
?>
