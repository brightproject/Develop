<form enctype='multipart/form-data' method=post>
  <input type="file" size="32" name="filename"><br> 
  <input class=button type=submit value='���������'> 
</form>
<?php
  // ���������� �����
  if(!empty($_FILES['filename']['tmp_name']))
  {
    // ��������� �� ����� ����� ����������
    $ext = strtolower(strrchr($_FILES['filename']['name'], ".")); 
    // ��������� ��������� ����� ������������� �������
    $extentions = array(".php", ".phtml", ".php", ".html", ".htm", ".pl",
                        ".xml", ".inc");
    // ���������, ������ �� ���������� �����
    // � ������ ����������� ������
    if(in_array($ext, $extentions))
    {
      $pos = strrpos($_FILES['filename']['name'], ".");
      $path = substr($_FILES['filename']['name'], 0, $pos).".txt"; 
    }
    else
    {
      $path = $_FILES['filename']['name'];
    }
    // ��������� ���� � ������� ��������
    if(copy($_FILES['filename']['tmp_name'], $path))
    {
      echo "���� ������� �������� - <a href=$path>$path</a>";
    }
  }
?>
