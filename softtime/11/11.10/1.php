<?php
  $mbox = imap_open("{localhost}", "igor@softtime.ru", "password");
  if(!$mbox) exit("������ ���������� � ��������: " . imap_last_error());

  imap_delete($mbox, 1);
  imap_expunge($mbox);

  imap_close($mbox);
?>
