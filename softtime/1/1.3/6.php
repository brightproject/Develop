<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // ������� ������ � ��������
  // ���������� �������� � ����� �������
  // ����� �����
  $max_lenght = 0;
  foreach($filename as $name)
  {
    $lenght = strlen($name);
    if($lenght > $max_lenght) $max_lenght = $lenght;
  } 
  // ������� ����� ������, �����������
  // �� ������� ����
  echo "<pre>";
  foreach($filename as $name) printf("%{$max_lenght}s\n", $name);
  echo "</pre>";
?>
