<?php
  // ���������� ������
  session_start();
  // ������� SID � ���������� �� HTML-����� �� ���������,
  // ������������� ������ �������
  if($_POST['session_id'] != session_id()) exit();
  if($_POST['name'] == 'admin' && $_POST['pass'] == 'admin')
  {
     echo "<br><br>������ ����������<br><br>";
     @mail("admin@somewhere.ru", "����������", "���� ������");
  }
?>
