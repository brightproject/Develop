<form method=post>
<input type=text name=ip size=35>
<input type=submit value='������� IP-�����'>
</form>
<?php
if(!empty($_POST['ip']))
{
  // ���������� � ������� TCP, ��������� �� ������� "whois.arin.net" �� 
  // ����� 43. � ���������� ������������ ���������� ���������� $sock.
  $sock = fsockopen("whois.arin.net", 43, $errno, $errstr);
  if (!$sock) exit("$errno($errstr)");
  else
  {
    // ���������� ������ �� ���������� $_POST["ip"] � ���������� ������.
    fputs ($sock, gethostbyname($_POST["ip"])."\r\n");
    // ������������ ������ �� ����������� ������.
    while (!feof($sock))
    {
      echo (str_replace(":",":&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",
                              fgets ($sock, 128))."<br>");
    }
  }
  // ��������� ����������
  fclose ($sock);
}
?>
