<?php
  // ������������ ����� ������ � �������
  $file_name = array('archive1.zip','archive2.zip','archive3.zip');

  // ��� �����, ��� �������� ����������
  $countname = "filecount.txt";
  // ���� ���� ���������� - ��������� ������� 
  // ���������� � ������
  if(file_exists($countname))
  {
    $fd = fopen($countname,"r");
    $content = fread($fd,filesize($countname));
    fclose($fd);
    // ������������� ������
    $count = unserialize($content);
  }
  // ���� ������ ����� ��� - ������� ���,
  // � ���������� ��������
  else
  {
    // ��������� ������ $count �������� ����������
    foreach($file_name as $file)
    {
      $count[$file] = 0;
    }
    // ������� �������������� ����
    $fd = fopen($countname,"w");
    // ����������� ������
    fwrite($fd, serialize($count));
    fclose($fd);
  }

  // ���������, �� �������� �� �������� ��������� down
  // ����� ����� GET
  if(isset($_GET['down']))
  {
    // ���������, ������ �� �������� ��������� $_GET['down']
    // � ������ $file_name
    if(in_array($_GET['down'],$file_name))
    {
      // ������������ ���� �������� ������� �����
      // ����������� �������� �������� � ������
      // $_GET['down'] �� �������
      $count[$_GET['down']]++;
      // �������������� ���� ��������
      $fd = fopen($countname,"w");
      // ����������� ������
      fwrite($fd, serialize($count));
      fclose($fd);

      // ������������� ������ �� ��� ��������
      header("Location: $_GET[down]");
    }
  }
  // ������� ������ �� �����
  foreach($file_name as $file)
  {
    echo "���� <a href=$_SERVER[PHP_SELF]?down=$file>$file</a> 
          ��� �������� ".$count[$file]." ���<br>";
  }
?>
