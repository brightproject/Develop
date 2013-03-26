<?php
  // ������ �� XML-����
  $url = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=".
         date("d/m/Y");
  // ��������� ����
  $content = file_get_contents($url);
  // ���������� ���������
  $pattern = "|<valute id=\"([^\"]+)\">[\s]*<NumCode>([^<]+)
              </NumCode>[\s]*<CharCode>([^<]+)
              </CharCode>[\s]*<Nominal>([^<]+)
              </Nominal>[\s]*<Name>([^<]+)
              </Name>[\s]*<Value>([^<]+)</Value>[\s]*</Valute>|is";
  preg_match_all($pattern, $content, $out);
  for($i = 0; $i < count($out[1]); $i++)
  {
    $out[6][$i] = str_replace(",",".",$out[6][$i]);
    if($out[3][$i] == "USD") echo "������ - ".
                         sprintf("%3.2f",$out[6][$i]/$out[4][$i])."<br>";
    if($out[3][$i] == "EUR") echo "���� - ".
                         sprintf("%3.2f",$out[6][$i]/$out[4][$i])."<br>";
  }
?>
