<table>
<form method=post>
<tr><td>���:</td><td><input type=text name=name 
                           value="<?= $_POST['name'] ?>"></td></tr>
<tr><td>&nbsp;</td><td><input type=submit value='������'></td></tr>
</form>
</table>
<?php
  if(!empty($_POST))
  {
    // ������������� ���������� � ����� ������
    require_once("config.php"); 

    // ��������� ���������� ���� name
    if(!preg_match("|^[^\']+$|",$_GET['name']))
    {
      exit("������������ ������ �������");
    }

    // ���������� ����� ������������ � ������ $_POST['name']
    $query = "SELECT * FROM userslist 
              WHERE name 
              LIKE '$_POST[name]%'
              ORDER BY name";
    $usr = mysql_query($query);
    if(!$usr) exit("������ - ".mysql_error());
    while($user = mysql_fetch_array($usr))
    {
      echo "��� ������������ - $user[name]<br>";
    }
  }
?>
