<?php
  // ���������� HTML-�����
  if($_POST)
  {
    // ������������� ��������� � ���� MySQL
    require_once("config.php");

    // ������������ �����������
    if (!get_magic_quotes_gpc())
    {
      $_POST['title'] = mysql_escape_string($_POST['title']);
      $_POST['description'] = mysql_escape_string($_POST['description']);
    }

    // ��������� ��������� �������
    $query = "INSERT INTO news 
              VALUES(NULL, 
                     '$_POST[title]',
                     '$_POST[description]',
                     NOW())";
    if(mysql_query($query)) header("Location: $_SERVER[PHP_SELF]");
    else echo "������ ��� ���������� ��������� ������� - ".mysql_error();
    exit();
  }
?>
<form method=post>
<table>
  <tr>
    <td>���������</td>
    <td><input type=text name=title></td>
  </tr>
  <tr>
    <td>����������</td>
    <td><textarea cols=40 
                  rows=5 
                  name=description></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type=submit value="��������"></td>
  </tr>
</table>
</form>
