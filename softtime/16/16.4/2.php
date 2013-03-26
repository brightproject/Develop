<form method="post"><table>
<tr><td>Укз рчхйч</td><td><input type="text" name="inode" 
                    value=<?php echo $_POST['inode']; ?>></td></tr>
<tr><td></td><td><input type="submit" value="Номаеоупщ"></td></tr>
</table></form>
<?php
  if(!empty($_POST))
  {
    echo "<pre>";
    system("find ./ -inum $_POST[inode] -print");
    echo "</pre>";
  }
?>
