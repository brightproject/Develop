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
  // 1. ���� �������� ������������ ������
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
  // ���� �� ������� �� �������� "���������� �������",
  // ������������ ��������� �������������� ������
  // �������� mysql_escape_string()
  if (!get_magic_quotes_gpc())
  {
    $_POST['name']  = mysql_escape_string($_POST['name']);
    $_POST['pass']  = mysql_escape_string($_POST['pass']);
    $_POST['email'] = mysql_escape_string($_POST['email']);
    $_POST['url']  = mysql_escape_string($_POST['url']);
  }

  /////////////////////////////////////////////////
  // 2. ���� �������� ����� �� ������������
  /////////////////////////////////////////////////
  // ������������� ���������� � ����� ������
  require_once("config.php"); 
  // ���������, �� ���� �� ���������� ���
  // ���������������� �����
  $query = "SELECT COUNT(*) FROM userslist WHERE name = '$_POST[name]'";
  $usr = mysql_query($query);
  if(!$usr) exit("������ - ".mysql_error());
  $total = mysql_result($usr, 0);
  if($total > 0)
  {
    exit("������ ��� ��� ����������������, ����������, �������� ������");
  }

  /////////////////////////////////////////////////
  // 3. ���� ����������� ������������
  /////////////////////////////////////////////////
  // ��������� � ��������� SQL-������ �� 
  // ���������� ������ ������������
  $query = "INSERT INTO userslist
            VALUES(NULL,
                   '$_POST[name]',
                   '$_POST[pass]',
                   '$_POST[email]',
                   '$_POST[url]')";
  if(mysql_query($query))
  {
    // ������������ ������������ ��������,
    // ����� �������� POST-������
    echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
          </HEAD></HTML>";
  } else exit("������ ��� ���������� ������ - ".mysql_error());
?>
