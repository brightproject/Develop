<?php
  // Ссылка на XML-файл
  $url = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=".
         date("d/m/Y");
  // Загружаем файл
  $content = file_get_contents($url);
  // Регулярное выражение
  $pattern = "|<valute id=\"([^\"]+)\">[\s]*<NumCode>([^<]+)
              </NumCode>[\s]*<CharCode>([^<]+)
              </CharCode>[\s]*<Nominal>([^<]+)
              </Nominal>[\s]*<Name>([^<]+)
              </Name>[\s]*<Value>([^<]+)</Value>[\s]*</Valute>|is";
  preg_match_all($pattern, $content, $out);
  echo "<table border=1>";
  echo "<tr>
          <td>ID</td>
          <td>Числовой код</td>
          <td>Символьный код</td>
          <td>Номинал</td>
          <td>Название</td>
          <td>Курс</td>
        </tr>";
  for($i = 0; $i < count($out[1]); $i++)
  {
    echo "<tr>
            <td>".$out[1][$i]."</td>
            <td>".$out[2][$i]."</td>
            <td>".$out[3][$i]."</td>
            <td>".$out[4][$i]."</td>
            <td>".$out[5][$i]."</td>
            <td>".$out[6][$i]."</td>
          </tr>";
  }
  echo "</table>";
?>
