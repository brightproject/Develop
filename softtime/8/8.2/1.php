<table>
<form method=post>
<tr><td>���:</td><td><input type=text name=name></td></tr>
<tr><td>������:</td><td><input type=password name=pass></td></tr>
<tr><td>������:</td><td><input type=password name=pass_again></td></tr>
<tr><td>e-mail:</td><td><input type=text name=email></td></tr>
<tr><td>URL:</td><td><input type=text name=url></td></tr>
<tr><td></td><td><input type=submit value='����������������'></td></tr>
</form>
</table>
<?php
  // ���������� HTML-�����

  /////////////////////////////////////////////////
  // 1. ���� �������� ������������ ����� ������
  /////////////////////////////////////////////////
  // ������� ������ �������
  $_POST['name'] = trim($_POST['name']);
  $_POST['pass'] = trim($_POST['pass']);
  $_POST['pass_again'] = trim($_POST['pass_again']);
  // ���������, �� ������ �� ��������������� ������ $_POST
  if(empty($_POST['name'])) exit();
  // ���������, ��������� �� ��������� ������������ ����
  if(empty($_POST['name'])) exit('���� "���" �� ���������');
  if(empty($_POST['pass'])) exit('���� �� ����� "������" �� ���������');
  if(empty($_POST['pass_again'])) 
                            exit('���� �� ����� "������" �� ���������');
  if($_POST['pass'] != $_POST['pass_again']) exit('������ �� ���������');
  // ���� ������ e-mail, ��������� ��� �� ������������
  if(!empty($_POST['email']))
  {
    if(!preg_match("|^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$|i",
                   $_POST['email']))
    {
      exit('���� "E-mail" ������ ��������������� ������� 
           somebody@somewhere.ru');
    }
  }

  /////////////////////////////////////////////////
  // 2. ���� �������� ����� �� ������������
  /////////////////////////////////////////////////
  // ��� ����� ������
  $filename = "text.txt"; 
  // ���������, �� ���� �� ���������� ���
  // ���������������� �����
  $arr = file($filename);
  foreach($arr as $line)
  {
    // ��������� ������ �� ����������� ::
    $data = explode("::",$line);
    // � ������ $temp �������� ����� ��� ������������������
    // �����������
    $temp[] = $data[0];
  }
  // ���������, �� ���������� �� ������� ���
  // � ������� ���� $temp
  if(in_array($_POST['name'], $temp))
  {
    exit("������ ��� ��� ����������������, ����������, �������� ������");
  }

  /////////////////////////////////////////////////
  // 3. ���� ����������� ������������
  /////////////////////////////////////////////////
  // �������� ������ � ��������� ����
  $fd = fopen($filename, "a");
  if(!$fd) exit("������ ��� �������� ����� ������");
  $str = $_POST['name']."::".
         md5($_POST['pass'])."::".
         $_POST['email']."::".
         $_POST['url']."\r\n";
  fwrite($fd,$str);
  fclose($fd);
  // ������������ ������������ ��������,
  // ����� �������� POST-������
  echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
        </HEAD></HTML>";
?>
