<?php
  // ������ �� XML-����
  $url = "http://img.lenta.ru/r/EX/import.rss";
  // ��������� ����
  $content = file_get_contents($url);
  // ���������� ���������
  $pattern = "|<item>[\s]*<title>(.*?)</title>[\s]*".
             "<link>(.*?)</link>[\s]*".
             "<description>(.*?)</description>[\s]*".
             "<pubDate>(.*?)</pubDate>[\s]*".
             "<category>(.*?)</category>|is";
  preg_match_all($pattern, $content, $out);
  // ������� ��������� 10 �������
  for($i = 0; $i < 10; $i++)
  {
    echo "<a href={$out[2][$i]}>{$out[1][$i]}</a><br>".
         "{$out[3][$i]}<br><br>";
  }
?>
