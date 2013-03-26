<?php
  $mbox = imap_open("{localhost}", "igor@softtime.ru", "password");
  if(!$mbox) exit("Ошибка соединения с сервером: ".imap_last_error());

  $check = imap_mailboxmsginfo($mbox);

  if ($check) 
  {
    echo "Date: ".$check->Date."<br>";
    echo "Driver: ".$check->Driver."<br> " ;
    echo "Mailbox: ".$check->Mailbox."<br> " ;
    echo "Messages: ".$check->Nmsgs."<br> " ;
    echo "Recent: ".$check->Recent."<br> " ;
    echo "Unread: ".$check->Unread."<br>" ;
    echo "Deleted: ".$check->Deleted."<br>" ;
    echo "Size: ".$check->Size."<br>" ;
  }

  imap_close($mbox);
?>
