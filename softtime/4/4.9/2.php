<?php
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ������ HTML-�����
  echo "<form action=3.php method=post>";

  // ��������� ������ ���������� ������
  $query = "SELECT * FROM catalogs 
            ORDER BY name";
  $cat = mysql_query($query);
  if(!$cat) exit(mysql_error());
  // ���� ������� ���� �� ���� ������,
  // �� ��������� ���������� ������
  if(mysql_num_rows($cat) > 0)
  {
    echo "<select name=id_catalog
           onchange='show(this.form.id_catalog)'>";
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

      // ��������� ������ ��������� ������ ���������
      $array_catalog[] = $catalog['id_catalog'];
    }
    echo "</select>";
  }
  
  // ��������� ������ ���������� ������
  $query = "SELECT * FROM catalogs";
  $cat = mysql_query($query);
  if(!$cat) exit(mysql_error());
  // ���� ������� ���� �� ���� ������,
  // ��������� ���������� ������
  if(mysql_num_rows($cat) > 0)
  {
    while($catalog = mysql_fetch_array($cat))
    {
      // ��������� ������� ������
      $query = "SELECT * FROM products
                WHERE id_catalog = $catalog[id_catalog]
                ORDER BY name";
      $prd = mysql_query($query);
      if(!$prd) exit(mysql_error());
      // ���� � ������� �������� ������� ���� ��
      // ���� �������� �������, �� ��������� ���������� ������
      if(mysql_num_rows($prd) > 0)
      {
        echo "<select id=$catalog[id_catalog]
           style=\"display:none\" name=product$catalog[id_catalog]>";
        while($product = mysql_fetch_array($prd))
        {
          if($_POST['id_product'] == $product['id_product'])
          {
            $selected = "selected";
          }
          else $selected = "";
          echo "<option value=$product[id_product] $selected>
                        $product[name]</option>";
        }
        echo "</select>";
      }
    }
  }
  echo "</br><input type=submit name=send value=���������>";

  // ����� HTML-�����
  echo "</form>";
?>
<script language='JavaScript1.1' type='text/javascript'>
<!--
  var messageIdList = new Array(<?= implode(",", $array_catalog) ?>);
  function show(sel)
  {
    for (i = 0; i < messageIdList.length; i++)
    {
      document.getElementById(messageIdList[i]).style.display = "none";
    }
    var selectedVal = sel.options[sel.selectedIndex].value;
    document.getElementById(selectedVal).style.display = "block";
  }
//-->
</script>