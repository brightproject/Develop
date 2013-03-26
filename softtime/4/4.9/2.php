<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Начало HTML-формы
  echo "<form action=3.php method=post>";

  // Формируем первый выпадающий список
  $query = "SELECT * FROM catalogs 
            ORDER BY name";
  $cat = mysql_query($query);
  if(!$cat) exit(mysql_error());
  // Если имеется хотя бы одна запись,
  // то формируем выпадающий список
  if(mysql_num_rows($cat) > 0)
  {
    echo "<select name=id_catalog
           onchange='show(this.form.id_catalog)'>";
    echo "<option value=0>Не имеет значения</option>";
    while($catalog = mysql_fetch_array($cat))
    {
      if($_POST['id_catalog'] == $catalog['id_catalog'])
      {
        $selected = "selected";
      }
      else $selected = "";
      echo "<option value=$catalog[id_catalog] $selected>
                    $catalog[name]</option>";

      // Формируем массив первичных ключей каталогов
      $array_catalog[] = $catalog['id_catalog'];
    }
    echo "</select>";
  }
  
  // Формируем второй выпадающий список
  $query = "SELECT * FROM catalogs";
  $cat = mysql_query($query);
  if(!$cat) exit(mysql_error());
  // Если имеется хотя бы одна запись,
  // формируем выпадающий список
  if(mysql_num_rows($cat) > 0)
  {
    while($catalog = mysql_fetch_array($cat))
    {
      // Формируем скрытые списки
      $query = "SELECT * FROM products
                WHERE id_catalog = $catalog[id_catalog]
                ORDER BY name";
      $prd = mysql_query($query);
      if(!$prd) exit(mysql_error());
      // Если в текущем каталоге имеется хотя бы
      // одна товарная позиция, то формируем выпадающий список
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
  echo "</br><input type=submit name=send value=Отправить>";

  // Конец HTML-формы
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