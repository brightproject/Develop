<?php
  // ��� �����
  $filename = "text.txt";
  // ������ ���������� �����
  $lines = file($filename);
  // ��������� ������ �� �������
  natsort($lines);
  // ������� ��� ���������� �������
  // � ����� �����
  array_walk($lines, 'trim_array');
  // ��������� ��������� � �����
  $fd = fopen($filename, "w");
  fwrite($fd, implode("\r\n", $lines));
  fclose($fd);

  function trim_array(&$item, $key)
  {
    $item = trim($item);
  }
?>
