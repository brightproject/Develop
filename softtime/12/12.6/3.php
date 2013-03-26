<form method=post>
  <input name="Whois" type="text" size=40 >
  <input type="submit" value="Search">
</form>
<?php 
  if(!empty($_POST))
  {
    $hostname = "www.ripn.net";
    $path = "/nic/whois/whois.cgi";
    $line = "";
    // Устанавливаем соединение, имя которого
    // передано в параметре $hostname
    $fp = fsockopen($hostname, 8080, $errno, $errstr, 30); 
    // Проверяем успешность установки соединения
    if (!$fp) echo "$errstr ($errno)<br />\n"; 
    // Данные HTTP-запроса
    $data = "Host=".urlencode("whois.ripn.net").
            "&Whois=".urlencode($_POST['Whois'])."&\r\n\r\n";
    // Заголовок HTTP-запроса
    $headers = "POST $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    $headers .= "Content-type: application/x-www-form-urlencoded\r\n";
    $headers .= "Content-Length: ".strlen($data)."\r\n\r\n";
    // Отправляем HTTP-запрос серверу
    fwrite($fp, $headers.$data); 
    // Получаем ответ
    while (!feof($fp))
    { 
      $line .= fgets($fp, 1024); 
    } 
    fclose($fp); 
    if(strpos($line, "No entries found for the selected source(s)."))
    {
      echo "Домен свободен";
    }
    $pattern = "|paid-till: ([^\n]+)\n|isU";
    preg_match($pattern, $line, $out);
    if(!empty($out[1])) echo "Домен занят и оплачен до ".$out[1];
  }
?>
