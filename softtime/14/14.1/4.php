<?php
  // ����������� ������
  $http = "http://www.softtime.ru/forum/";
  // ����� ��������, �� ������� ������ ������
  $url = "http://ru.wikipedia.org/wiki/PHP";

  // ��������� ���������� �������� $url
  $contents = file_get_contents($url);
  $http = str_replace(".","\.",$http);
  $pattern = "|<a[\s]+href=\"$http\"|is";

  if(preg_match($pattern,$contents))
  {
    $str = date("d.m.Y H:i:s")." - ������ ������������ �� ��������\r\n";
  }
  else
  {
    $str = date("d.m.Y H:i:s")." - ������ ����������� �� ��������\r\n";
    if(date("G") == 0 && date("i") > 0 && date("i") < 10)
    {
      mail("admin@somewhere.ru","����������� ������",$str);
    }
  }

  $fd = fopen("link.log","a");
  if($fd)
  {
    fwrite($fd,$str);
    fclose($fd);
  }
?>
