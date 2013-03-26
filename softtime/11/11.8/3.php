<?php
  $mbox = imap_open("{localhost}", "igor@softtime.ru", "password");
  if(!$mbox) exit("Ошибка соединения с сервером: " . imap_last_error());

  echo "Количество сообщений ".imap_num_msg($mbox)."<br>";
  echo "Количество новых сообщений ".imap_num_recent($mbox);

  imap_close($mbox);
?>
