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
    // � ������ $temp �������� ����� ��� ������������������
    // �����������
    echo "��� - ".htmlspecialchars($data[0])."<br>";
    if(!empty($data[2])) echo "e-mail - ".
                               htmlspecialchars($data[2])."<br>";
    if(!empty($data[3])) echo "URL - ".htmlspecialchars($data[3])."<br>";
    echo "<br>";
  }
?>
