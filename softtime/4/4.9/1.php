<?php
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ������ HTML-�����
  echo "<form method=post>";

  // ��������� ������ ���������� ������
  $query = "SELECT * FROM catalogs 
            ORDER BY name";
  $cat = mysql_query($query);
  if(!$cat) exit(mysql_error());
  // ���� ������� ���� �� ���� ������,
  // �� ��������� ���������� ������
  if(mysql_num_rows($cat) > 0)
  {
    echo "<select name=id_catalog onchange='this.form.submit()'>";
    echo "<option value=0>�� ����� ��������</option>";
    while($catalog = mysql_fetch_array($cat))
    {
      if($_POST['id_catalog'] == $catalog['id_catalog'])
      {
        $selected = "selected";
      }
      else $selected = "";
      echo "<option value=$catalog[id_catalog] $selected>
                    $catalog[name]</option>";
    }
    echo "</select>";
  }
  
  // ���������, �������� �� �������� id_catalog ������
  if(preg_match("|^[\d]+$|",$_POST['id_catalog']))
  {
    // ��������� ������ ���������� ������
    $query = "SELECT * FROM products
              WHERE id_catalog = $_POST[id_catalog]
              ORDER BY name";
    $prd = mysql_query($query);
    if(!$prd) exit(mysql_error());
    // ���� � ������� �������� ������� ���� ��
    // ���� �������� �������, �� ��������� ���������� ������
    if(mysql_num_rows($prd) > 0)
    {
      echo "<select name=id_product onchange='this.form.submit()'>";
      while($product = mysql_fetch_array($prd))
      {
        echo "<option value=$product[id_product]>
                      $product[name]</option>";
      }
      echo "</select>";
    }
  }

  // ����� HTML-�����
  echo "</form>";
?>
