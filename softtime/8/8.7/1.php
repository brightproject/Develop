<?php
  // ���������� �����
  if(!empty($_POST))
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
    // �������� ���������� �������
    $total = mysql_result($usr,0);
    if($total > 0)
    {
      // ����������� ������ �������
      // ������������� cookie �� ����� (3600*24)
      setcookie("user", urlencode($_POST['name']), time() + 3600*24);
      // ������������ ������������, ����� 
      // �������� POST-������
      echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
            </HEAD></HTML>";
    }
  }
?>
<form method=post> 
��� : <input type=text name=name 
                        value='<?= $_COOKIE['user']; ?>'><br> 
������ : <input type=password name=password 
                value=><br> 
<input type=submit value=���������> 
</form> 
<?php 
  // ���� ���������� "�����" - ������������ ��� 
  if(isset($_COOKIE['user']))
  {
    // ������������� ���������� � ����� ������
    require_once("config.php"); 
    // ������� �����������
    echo "������������, ".$_COOKIE['user']."!<br>";
    echo "������ � ����� ��������� ������<br>";
    // ������� ������ ������������
    $query = "SELECT * FROM userslist WHERE name = '$_COOKIE[user]'";
    $usr = mysql_query($query);
    if(!$usr) exit(mysql_error());
    $user = mysql_fetch_array($usr);
    echo "��� e-mail: ".$user['email']."<br>";
    echo "��� URL: ".$user['url']."<br>";
  }
?>
