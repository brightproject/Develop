<?php
  // ������������� ���������� � ����� ������
  require_once("config.php"); 

  // ��������� ������ �� ���������� ������
  // ���� �������� �������
  $query = "SELECT SUBSTRING(name,1,1) AS letter 
            FROM products 
            GROUP BY letter
            ORDER BY letter";
  $prd = mysql_query($query);
  if(!$prd) exit(mysql_error());
  // ���� ������� ���� �� ���� ������,
  // �� ������� ��
  if(mysql_num_rows($prd) > 0)
  {
    while($product = mysql_fetch_array($prd))
    {
      echo "<a href=$_SERVER[PHP_SELF]?letter=$product[letter]>
                                           $product[letter]</a>";
    }
  }

  // ���� ������� �������� letter � ��
  // ������� �� ������ ������� - �������
  // ���������� �������
  if(preg_match("|^[a-z]$|i", $_GET['letter']))
  {
    // ������� �������� �������
    $query = "SELECT * FROM products 
              WHERE SUBSTRING(name,1,1) = '$_GET[letter]'
              ORDER BY price";
    $prd = mysql_query($query);
    if(!$prd) exit(mysql_error());
    // ���� � ������� �������� ������� ���� ��
    // ���� �������� �������, �� ������� ��
    if(mysql_num_rows($prd) > 0)
    {
      echo "<br><br><table border=1>
              <tr>
                <td>��������</td>
                <td>����</td>
              </tr>";
      while($product = mysql_fetch_array($prd))
      {
        echo "<tr>
                <td>$product[name]</td>
                <td>$product[price]</td>
              </tr>";
      }
      echo "</table>";
    }
  }
?>
