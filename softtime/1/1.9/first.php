<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // ���������� ������
  session_start();
  // ������� ������ ������
  unset($_SESSION['filename']);
  // � ����� ��������� ������� ���� � 
  // ���������� �������
  foreach($filename as $name)
  {
    $_SESSION['filename'][] = $name;
  }
  // ������� ������ �� �������� second.php
  echo "<a href=second.php>������� �� �������� second.php</a>";
?>
