<form method=post>
  <input type=text name=name value="<?= $_POST['name']; ?>">
  <input type=submit value='��������'>
</form><br>
<?php
  // ���������� HTML-�����
  if(isset($_POST['name']))
  {
    // ������� ���� �� ��������� ������
    $filename = tempnam("./", "fl");
    // ��������� ����
    $fd = fopen($filename, "w");
    // ���������� � ���� ������, ���������
    // �������������
    fwrite($fd, $_POST['name']);
    // ��������� ����
    fclose($fd);
  }
?>
