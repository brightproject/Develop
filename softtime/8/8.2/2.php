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
    if($data[0] == $temp['name'][$index])
    {
      // ��������� ����� ������ ������ ������
      $linefile[] = $_POST['name']."::".md5($_POST['passw'])."::".
                          $_POST['email']."::".$_POST['url'];
      $_POST['pass'] = $_POST['passw'];
      $temp['email'][$index]    = $_POST['email'];
      $temp['url'][$index]      = $_POST['url'];
    }
    else $linefile[] = trim($line);
  }
?>
