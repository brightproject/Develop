<?php
  if($_POST['name'] == 'admin' && $_POST['pass'] == 'admin')
  {
     echo "<br><br>������ ����������<br><br>";
     @mail("admin@somewhere.ru", "����������", "���� ������");
  }
?>
