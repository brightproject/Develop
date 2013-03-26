<form method="post"><table>
<tr><td>Имя файла</td><td><input type="text" name="filename" 
                    value=<?php echo $_POST['filename']; ?>></td></tr>
<tr><td></td><td><input type="submit" value="Проверить"></td></tr>
</table></form>
<?php
  if(!empty($_POST))
  {
    echo fileinode($_POST['filename']);
  }
?>
