<?php
  // ���� � ����
  $year = 365.25;
  // ����� ���� ��-�� ������� ������
  $academic_council = -14*12;
  // ���������� ����� ����� ��-�� �������
  $fishing = 10*6;
  // ����� ��� ���������� ����� ����� � ���
  $delta = $academic_council + $fishing;

  $total = 70*365.25;
  for($days = 30*365.25; $days <= 70*365.25; $days += $year)
  {
    $total += $delta;
    if($days > $total) break;
  }
  echo $total/$year;
?>
