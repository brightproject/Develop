<?php
  // ��� �����
  $filename = "text.txt";
  // ��������� ���� ��� ������
  $fd = fopen($filename, "r");
  // ������ ���������� �����
  $bufer = fread($fd, filesize($filename));
  // ��������� ����
  fclose($fd);
  // ������� ��� ������ ��� ������ ����������� ���������
  preg_match_all("#([\d]+) ([^\n]+)(\n|$)#U",
                 $bufer, 
                 $out,
                 PREG_PATTERN_ORDER);
  // ��������� ������������� ������
  for($i = 0; $i < count($out[1]); $i++)
  {
    $temp[$out[1][$i]] = trim($out[2][$i]);
  }
  // ��������� ������
  asort($temp);
  // ��������� �������� ������
  foreach($temp as $key => $value)
  {
    $line[] = $key." ".$value;
  }
  // ��������� ��������� � �����
  $fd = fopen($filename, "w");
  fwrite($fd, implode("\r\n", $line));
  fclose($fd);
?>
