<?php
  // ��������� ���������� �� ����� index.htm
  $content = file_get_contents("index.htm");

  // ������� HTML-����
  $content = preg_replace("|[\s]+|s", " ", strip_tags($content));

  // ������������ ���������� �������������� ����
  preg_match_all("|\b[\w]{1}\b|s", $content, $out, PREG_PATTERN_ORDER);
  // ������� ���������
  echo "���������� �������������� ���� - ".count($out[0])."<br>";
  echo "<pre>";
  print_r($out[0]);
  echo "</pre>";
?>
