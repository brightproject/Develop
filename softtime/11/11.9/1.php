<?php
  $mbox = imap_open("{localhost}", "igor@softtime.ru", "password");
  if(!$mbox) exit("������ ���������� � ��������: " . imap_last_error());

  echo "���������� ��������� - ".imap_num_msg($mbox)."<br>";
  for($i = 1; $i <= imap_num_msg($mbox); $i++)
  {
    $obj = imap_headerinfo($mbox, $i);
    echo $obj->Subject."<br>";
  }

  imap_close($mbox);
?>
