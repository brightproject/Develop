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
    echo "������ ������������ �� ��������";
  }
  else
  {
    echo "������ ����������� �� ��������";
  }
?>
