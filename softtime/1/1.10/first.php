<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // ����������� ������ � ������
  $content = serialize($filename);
  // ������������� cookie, ��������� ��������
  // time() + 3600 - ��� ����� ����� cookie
  // ��������������� �� ���
  setcookie('filename',$content, time() + 3600);
  // ������� ������ �� �������� second.php
  echo "<a href=second.php>������� �� �������� second.php</a>";
?>
