<?php
  // ��������� ���������, ���������� �������
  $order = "name";
  if($_GET['order'] == 'name')  $order = "name";
  if($_GET['order'] == 'price') $order = "price";
  if($_GET['order']  == 'mark')  $order = "mark";
  if($_GET['order'] == 'count') $order = "count";
  if($_GET['add']   == 'desc')
  {
    $desc = "DESC";
    $add  = "";
  }
  else
  {
    $desc = "";
    $add  = "desc";
  }
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ������� �������� �������
  $query = "SELECT * FROM products 
            ORDER BY $order $desc";
  $prd = mysql_query($query);
  if(!$prd) exit(mysql_error());
  // ���� � ������� �������� ������� ���� ��
  // ���� �������� �������, �� ������� ��
  if(mysql_num_rows($prd) > 0)
  {
    echo "<table border=1>
            <tr>
  <td><a href=$_SERVER[PHP_SELF]?order=name&add=$add>��������</a></td>
  <td><a href=$_SERVER[PHP_SELF]?order=price&add=$add>����</a></td>
  <td><a href=$_SERVER[PHP_SELF]?order=mark&add=$add>������</a></td>
  <td><a href=$_SERVER[PHP_SELF]?order=count&add=$add>����������</a></td>
            </tr>";
    while($product = mysql_fetch_array($prd))
    {
      echo "<tr>
              <td>$product[name]</td>
              <td>$product[price]</td>
              <td>$product[mark]</td>
              <td>$product[count]</td>
            </tr>";
    }
    echo "</table>";
  }
?>
