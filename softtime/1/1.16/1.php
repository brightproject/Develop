<form method=get> 
������� ���������� �����:
<input type=text name=dec size=5 value=<?= $_GET['dec'] ?>><br>
<input type=submit value="�������������"> 
</form>
<?php
  if(!empty($_GET))
  {
    $binary = ""; 
    $dec = $_GET['dec']; 
    do 
    { 
      if($dec % 2) $binary = '1'.$binary; 
      else $binary = '0'.$binary; 
      $dec = (int)($dec / 2); 
    } while($dec); 
    echo $binary."<br>"; 
  }
?>
