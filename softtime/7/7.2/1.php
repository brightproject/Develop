<?php
  // ��������� ���� � HTML-����� �� ������� �������
  $html = "http://".$_SERVER['SERVER_NAME']."/test/index.php";
  // ���������, �������� �� ������ � �������� �������
  if($_SERVER['HTTP_REFERER'] == $html)
  {
    if($_POST['name'] == 'admin' && $_POST['pass'] == 'admin')
    {
       echo "<br><br>������ ����������<br><br>";
       @mail("admin@somewhere.ru", "����������", "���� ������");
    }
  }
  else
  {
    echo "��������� �� ����� �� ����� ���� ���������";
  }
?>
