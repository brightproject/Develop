<?php
  // ���������� �����
  if(!empty($_POST['name']))
  {
    // ������������� ���������� � ����� ������
    require_once("config.php");
    // ������������ ����������� �� ��������� 
    // �������
    if (!get_magic_quotes_gpc())
    {
      $_POST['name'] = mysql_escape_string($_POST['name']);
      $_POST['email'] = mysql_escape_string($_POST['email']);
    }

    // ��������� �������
    $query = "INSERT INTO user_email 
              VALUES (NULL, 
                     '$_POST[name]', 
                      AES_ENCRYPT('$_POST[email]','��������� ����'))";
    if(!mysql_query($query))
    {
      exit("������ ���������� ������ ������������<br>
            <a href=$_SERVER[PHP_SELF]>�����</a>");
    }
    else
    {
      exit("����� ������������ ������� ��������<br>
            <a href=$_SERVER[PHP_SELF]>�����</a>");
    }
  }
?>
<form method=post>
<table>
  <tr>
    <td>��� ������������:</td>
    <td><input type="text" name="name"></td> 
  </tr>
  <tr>
    <td>E-mail ������������:</td>
    <td><input type="text" name="email"></td> 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input class=button type=submit value='��������'></td> 
  </tr>
</form>
