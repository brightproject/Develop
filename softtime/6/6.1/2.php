<?php 
  // ������������� ���������� � ����� ������
  include "config.php";
  // ������� ����� ���� �����������, ������ � ������� ������� 
  // � ������� session 
  $query = "SELECT * FROM session"; 
  $ath = mysql_query($query); 
  if(!$ath) exit("<p>������ � ������� � ������� ������</p>"); 
  // ���� ���� ���-�� ���� - ������� ������� 
  if(mysql_num_rows($ath)>0) 
  { 
    echo "<table>"; 
    while($author = mysql_fetch_array($ath))
    {
      // ���� ���������� �� ���������������,
      // ������� ������ ��� ����� "������"
      if(empty($author['user'])) echo "<tr><td>������</td></tr>"; 
      else echo "<tr><td>".$author['user']."</td></tr>"; 
    }
    echo "</table>"; 
  } 
?>
