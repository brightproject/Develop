<?php
  // ���������� ������
  session_start();
?>
<form method=post> 
��� : <input type=text name=name 
                       value='<?= $_SESSION['name']; ?>'><br> 
������ : <input type=password name=password 
                value='<?= $_SESSION['password']; ?>'><br> 
<input type=submit value=���������> 
</form> 
<?
  // ���������� �����
  if(!empty($_POST['name']) && !empty($_POST['password']))
  {
    // ������������� ���������� � ����� ������
    require_once("config.php"); 
    // ��������� �� SQL-��������, ����������
    // ���������� ������ � ����� ����� �������
    // mysql_escape_string
    if (!get_magic_quotes_gpc())
    {
      $_POST['name'] = mysql_escape_string($_POST['name']);
      $_POST['password'] = mysql_escape_string($_POST['password']);
    }
    // ������������ ������, ������� ����������
    // ���������� �������, ��������������� ������
    // � ������
    $query = "SELECT COUNT(*) FROM userslist
              WHERE name = '$_POST[name]' AND pass = '$_POST[password]'";
    $usr = mysql_query($query);
    if(!$usr) exit("������ � ����� �����������");
    // ���� ���������� ������� ������ 0,
    // ������� ������ � ������������ � ������
    if(mysql_result($usr,0))
    {
      $_SESSION['name'] = $_POST['name'];
      $_SESSION['password'] = $_POST['password'];
    }
  }
  // ���� ���������� "�����" - ������������ ��� 
  if(isset($_SESSION['name']))
  {
    // ������������� ���������� � ����� ������
    require_once("config.php"); 
    // ������� �����������
    echo "������������, ".$_SESSION['name']."!<br>";
    echo "������ � ����� ��������� ������<br>";
    // ������� ������ ������������
    $query = "SELECT * FROM userslist WHERE name = '$_SESSION[name]'";
    $usr = mysql_query($query);
    if(!$usr) exit(mysql_error());
    $user = mysql_fetch_array($usr);
    echo "��� e-mail: ".$user['email']."<br>";
    echo "��� URL: ".$user['url']."<br>";
  }
?> 
