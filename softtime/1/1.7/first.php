<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // ���������� �������� ������� � ������ ����
  // filename[]=first&filename[]=second&:
  $url = implode("&filename[]=", $filename);
  $url = "second.php?filename[]=".$url;
  echo "<a href=$url>������ �� ���� second.php</a>";
?>
