<?php
	session_start();
?>

 <?php
     
    // �������� ������� ������� "�����"
    if (!isset($_POST["enter"]))
    {
    // ���� �� ������
    ?>

		<table cellspacing="0" style="width: 98%;" border="0" cellpadding="0">
			<tr>
			   <td>
    <center>
    <h4>�����������</h4><br>
    <form action="login.php" method="post">
    <h4>���:</h4>
       <input type="text" name="name" value=""><br><br>
    <h4>Password:</h4>
       <input type="password" name="pass"><br><br>
       <input type="submit" name="enter" value="�����">
    </form>
	</center>
			   </td>
			</tr>
		</table>

    <?php
    }
    else
    {
     // ���� ������ ������ � ���� ���� ������ � ������ �� ������
     if ($_POST["name"] != "" and $_POST["pass"] != "")
     {
     $safe_name=mysql_escape_string($_POST['name']);
     $safe_pass=mysql_escape_string($_POST['pass']);
     
     // ����� ������ ������ 20 ��������
     $safe_name = substr($safe_name, 0, 20);
     $safe_pass = substr($safe_pass, 0, 20);
     
     // ����������� ������ � MD5-���
     $safe_pass=md5($safe_pass);
     
     // ��������� SQL-������
     $sql = "SELECT name,pass,role FROM test_userlist WHERE name='" . $safe_name . "' AND pass='" . $safe_pass . "'";
     // ������������ � ���� ������
		require_once ("connection.php");
     
     // ������ ������
     $result = mysql_query($sql);
     
     // �������� ������������� ������
     if(!mysql_num_rows($result))
            echo "<center><h4>�������� ����� ��� ������</h4><br><a href=\"login.php\">�����</a></center>";
     else
     {
     // ���������� ���������� � ������
     $line = mysql_fetch_row($result);
     $_SESSION["autorized"]=true;
     $_SESSION["name"]=$safe_name;
     $_SESSION["role"]=$line[2];
     
     // ������� ������ ��� ����� � ������� (����� ������� ���������������)
    echo "<HTML><HEAD>
<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>
</HEAD>";
     }
       }
       else
       {
     echo "<center><h4>�� ������� ������</h4><br><a href=\"login.php\">�����</a></center>";
       }
    }
     
    ?>
