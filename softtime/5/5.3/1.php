<?php 
  // �������� HTTP-���������
  $hostname = "http://www.softtime.ru/files/configs.zip";
  $out = get_content($hostname);

  // ���������� ���������� ������� � ���� ������
  $lines = implode(" ",$out);
  // ���������� ���������� ���� � ������������ �����
  // �� ����������� ���������
  preg_match("|Content-Length:[\s]+([\d]+)|i", $lines, $matches);
  // ������� ���������
  echo "���������� ���� � ������ - ".$matches[1];
?>
