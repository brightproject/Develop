<?php
  $theme = "����� � �����";
  $theme =  convert_cyr_string($theme, 'w', 'k'); 
  $message = "<html>
              <head></head>
              <body>
              ������ ���������� - ".date("d.m.Y H:i:s")."<br>
              ������ ������� ����������� - 
             ".filesize($_SERVER['PHP_SELF'])."
              </body>
              </html>";
  $message =  convert_cyr_string($message, 'w', 'k'); 
  $headers = "Content-Type: text/html; charset=KOI8-R\r\n";
  if(mail($to, $subject, $message, $headers))
  {
    echo "������ ������� ����������";
  }
  else
  {
    echo "��������� ������ - ������ �� ����������";
  }
?>
