<?php
  $mbox = imap_open("{localhost}", "igor@softtime.ru", "password");
  if(!$mbox) exit("Ошибка соединения с сервером: " . imap_last_error());

  echo "Количество сообщений - ".imap_num_msg($mbox)."<br>";
  for($i = 1; $i <= imap_num_msg($mbox); $i++)
  {
    $obj = imap_headerinfo($mbox, $i);
    $arr = imap_mime_header_decode($obj->Subject);
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
  }

  imap_close($mbox);
?>
