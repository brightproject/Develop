<?php
  // ��� �����
  $filename = "text.txt";
  $str = "���������������� �� Visual Basic";

  // ���������� ������������ ����� �������
  // ������ ���������� �����
  $arr = file($filename);
  $maxval = 0;
  foreach($arr as $line)
  {
    preg_match("|^([\d]+)([^\n]+)$|",$line,$out);
    if($maxval < $out[1]) $maxval = $out[1];
  }

  // ��������� ���������� �����
  $content = file_get_contents($filename);
  // ��������� � ����������� ����� ������
  $content .= "\n".($maxval + 1)." ".$str;

  // ��������� ��������� � �����
  $fd = fopen($filename, "w");
  fwrite($fd, $content);
  fclose($fd);
?>
