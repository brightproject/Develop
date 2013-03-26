<?php
  $mbox = imap_open("{localhost}", "igor@softtime.ru", "password");
  if(!$mbox) exit("Ошибка соединения с сервером: " . imap_last_error());

  echo "Количество сообщений - ".imap_num_msg($mbox)."<br>";
  for($i = 1; $i <= imap_num_msg($mbox); $i++)
  {
    $obj = imap_headerinfo($mbox, $i);
    echo $obj->Subject."<br>";
  }

  imap_close($mbox);
?>
