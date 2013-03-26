<form method=post>
<input type=text name=ip size=35>
<input type=submit value='Введите IP-адрес'>
</form>
<?php
if(!empty($_POST['ip']))
{
  // Соединение с сокетом TCP, ожидающим на сервере "whois.ripe.net" по 
  // порту 43. В результате возвращается дескриптор соединения $sock.
  $sock = fsockopen("whois.ripe.net", 43, $errno, $errstr);
  if (!$sock) exit("$errno($errstr)");
  else
  {
    // Записываем строку из переменной $_POST["ip"] в дескриптор сокета.
    fputs ($sock, $_POST["ip"]."\r\n");
    // Осуществляем чтение из дескриптора сокета.
    while (!feof($sock))
    {
      echo (str_replace(":",":&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",
                              fgets ($sock, 128))."<br>");
    }
  }
  // закрываем соединение
  fclose ($sock);
}
?>
