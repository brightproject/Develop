<?php
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ������� �������� �������
  $query = "SELECT * FROM products 
            ORDER BY name";
  $prd = mysql_query($query);
  if(!$prd) exit(mysql_error());
  // ���� � ������� �������� ������� ���� ��
  // ���� �������� �������, �� ������� ��
  if(mysql_num_rows($prd) > 0)
  {
    echo "<form method=post>";
    echo "<table border=1>
            <tr>
              <td>&nbsp;</td>
              <td>��������</td>
              <td>����</td>
              <td>������</td>
              <td>����������</td>
            </tr>";
    $i = 0;
    while($product = mysql_fetch_array($prd))
    {
      echo "<tr>
              <td><input type=checkbox name=product[]
                         value=$product[id_product]></td>
              <td>$product[name]</td>
              <td>$product[price]</td>
              <td>$product[mark]</td>
              <td>$product[count]</td>
            </tr>";
      $i++;
    }
    echo "</table>";
    echo "</br><input type=submit name=send value=�������>";
    echo "</form>";
  }

  // ���� ��������������� ������ $_POST �� ����,
  // ���������� ��������� �������
  if(!empty($_POST))
  {
    // ��� �������� �������� ������� ����������
    // ������������ ������ ����
    // DELETE FROM products WHERE id_product IN (4, 6, 8, ..., 20)
    // ��� ����� � ������� �������� ����������
    // ������� $_POST['product'][] 
    $temp = array();
    foreach($_POST['product'] as $id_product)
    {
      // ���������, �������� �� ���������� $id_product ������
      if(preg_match("|^[\d]+$|",$id_product))
      {
        $temp[] = $id_product;
      }
    }
    // ��������� � ��������� ������ �� ��������
    // ���������� �������
    $query = "DELETE FROM products 
              WHERE id_product IN (".implode(",",$temp).")";
    if(mysql_query($query))
    {
      echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
            </HEAD></HTML>";
    }
  }
?>
