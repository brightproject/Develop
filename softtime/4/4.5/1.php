<table>
<form method=post>
<tr>
  <td>���:</td>
  <td><input type=text name=name value="<?= $_POST['name'] ?>"></td>
</tr>
<tr>
  <td>������:</td>
  <td><input type=password name=pass value="<?= $_POST['pass'] ?>"></td>
</tr>
<tr><td>&nbsp;</td><td><input type=submit value='�������'></td></tr>
</form>
</table>
<?php
  // ������������� ���������� � ����� ������
  require_once("config.php"); 

  if(!empty($_POST))
  {
    // ������� ��� ������������, ���� ������ �
    // ��� ���������
    $query = "DELETE FROM userslist 
              WHERE pass = '$_POST[pass]' AND
                    name = '$_POST[name]'";
    if(mysql_query($query))
    {
      echo "������������ $_POST[name] ������� ������<br>";
    }
  }

  echo "������ �������������:<br>";
  $query = "SELECT * FROM userslist
            ORDER BY name";
  $usr = mysql_query($query);
  if(!$usr) exit("������ - ".mysql_error());
  while($user = mysql_fetch_array($usr))
  {
    echo $user['name']."<br>";
  }
?>
