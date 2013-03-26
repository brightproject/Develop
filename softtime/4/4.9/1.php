<?php
  // ”станавливаем соединение с базой данных
  require_once("config.php");

  // Ќачало HTML-формы
  echo "<form method=post>";

  // ‘ормируем первый выпадающий список
  $query = "SELECT * FROM catalogs 
            ORDER BY name";
  $cat = mysql_query($query);
  if(!$cat) exit(mysql_error());
  // ≈сли имеетс€ хот€ бы одна запись,
  // то формируем выпадающий список
  if(mysql_num_rows($cat) > 0)
  {
    echo "<select name=id_catalog onchange='this.form.submit()'>";
    echo "<option value=0>Ќе имеет значени€</option>";
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
  
  // ѕровер€ем, €вл€етс€ ли параметр id_catalog числом
  if(preg_match("|^[\d]+$|",$_POST['id_catalog']))
  {
    // ‘ормируем второй выпадающий список
    $query = "SELECT * FROM products
              WHERE id_catalog = $_POST[id_catalog]
              ORDER BY name";
    $prd = mysql_query($query);
    if(!$prd) exit(mysql_error());
    // ≈сли в текущем каталоге имеетс€ хот€ бы
    // одна товарна€ позици€, то формируем выпадающий список
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

  //  онец HTML-формы
  echo "</form>";
?>
