<?php
  // ��� ����� ������
  $filename = "text.txt"; 
  // ���������, �� ���� �� ���������� ���
  // ���������������� �����
  $arr = file($filename);
  foreach($arr as $line)
  {
    // ��������� ������ �� ����������� ::
    $data = explode("::",$line);
    // ���� ���� ����������� � Windows,
    // ��������� ������� ����� ��������� 
    // �� ����� ������ \r - ����������� �� ����
    $data[3] = trim($data[3]);
    // ���� ������ ������� ������������, 
    // ��������� ������
    if($_GET['name'] == $data[0])
    {
      $name = $data[0];
      $email = $data[2];
      $url = $data[3];
    }

    // ��������� ������ �����������
    echo "<a href=$_SERVER[PHP_SELF]?name=$data[0]>".
             htmlspecialchars($data[0])."</a><br>";
  }
  if(isset($_GET['name']))
  {
  // � ������ $temp �������� ����� ��� ������������������
  // �����������
  echo "��� - ".htmlspecialchars($name)."<br>";
  if(!empty($email)) echo "e-mail - ".htmlspecialchars($email)."<br>";
  if(!empty($url)) echo "URL - ".htmlspecialchars($url)."<br>";
  echo "<br>";
  }
?> 
