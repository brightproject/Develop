<?php
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ��������� ������ �������������
  $query = "SELECT user, 
                   AES_DECRYPT(email, '��������� ����') AS email 
            FROM user_email
            ORDER BY user";
  $usr = mysql_query($query);
  if(!$usr) exit("������ ��������� � ������ �������������");
  if(mysql_num_rows($usr))
  {
    echo "<table border=1>";
    echo "<tr>
            <td>������������</td>
            <td>E-mail</td>
          </tr>";
    while($user = mysql_fetch_array($usr))
    {
      echo "<tr>
              <td>".htmlspecialchars($user['user'])."</td>
              <td>".htmlspecialchars($user['email'])."</td>
            </tr>";
    }
    echo "</table>";
  }
?>
