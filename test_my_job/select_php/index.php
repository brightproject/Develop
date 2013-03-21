<?php
$db = mysql_connect("localhost", "root","" );
mysql_select_db("vladilena", $db);

function selectmenu($name, $query, $selected){
  $result = mysql_query($query);
  $ret = '<select name="' . $name . '">';
  $ret .= '<option> --- select --- </option>';
  while ($row = mysql_fetch_array($result)) {
    $ret .= '<option value="' . $row[0] . '"';
    if($row[0] == $selected)
      $ret .= ' selected="selected"';
    $ret .= '>' . $row[1] . '</option>';
   }
   $ret .= '</select>';
   return $ret . "n";
}
?>
<form name="form1" method="post" action="">
<?php
  $query = "SELECT * FROM folder";
  $name = "name";
  $selected = "folder";
  echo selectmenu($name, $query, $selected);
?>
<input type="submit" name="submit" value="Submit">
</form>