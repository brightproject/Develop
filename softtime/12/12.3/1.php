<center>
 <form method=post>
 <input type=text name=ip size=35>
 <input type=submit value='������� IP-�����'>
 </form>
</center>
<?php
if(!empty($_POST['ip'])) echo whois("whois.arin.net",$_POST['ip']);

function whois($url,$ip)
{
  // ���������� � ������� TCP, ��������� �� ������� "whois.arin.net" �� 
  // ����� 43. � ���������� ������������ ���������� ���������� $sock.
  $sock = fsockopen($url, 43, $errno, $errstr);
  if (!$sock) exit("$errno($errstr)");
  else
  {
    echo $url."<br>";
    // ���������� ������ �� ���������� $_POST["ip"] � ���������� ������.
    fputs ($sock, $ip."\r\n");
    // ������������ ������ �� ����������� ������.
    $text = "";
    while (!feof($sock))
    {
      $text .= fgets ($sock, 128)."<br>";
    }
    // ��������� ����������
    fclose ($sock);

    // ���� ����������� �������
    $pattern = "|ReferralServer: whois://([^\n<:]+)|i";
    preg_match($pattern, $text, $out);
    if(!empty($out[1])) return whois($out[1], $ip);
    else return $text;
  }
}
?>
