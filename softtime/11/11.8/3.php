<?php
  $mbox = imap_open("{localhost}", "igor@softtime.ru", "password");
  if(!$mbox) exit("������ ���������� � ��������: " . imap_last_error());

  echo "���������� ��������� ".imap_num_msg($mbox)."<br>";
  echo "���������� ����� ��������� ".imap_num_recent($mbox);

  imap_close($mbox);
?>
