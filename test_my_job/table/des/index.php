<?
	##################################################################
	##		Copyright by [CNS]BrainPhP (2007 �.)		##
	##								##
	##			PictireScaningForTable			##
	##			       PSFT v1.0			##
	##								##
	##		[CNS] - ���� ������������			##
	##		Brain - ����� ������������			##
	##		PhP   - ������������ ���� ����������		##
	##								##
	##		realname: ������� ����� ������������		##
	##								##
	##	------------------------------------------------	##
	##			����� � �������:			##
	##	mailto: brain@shadrinsk.net				##
	##	url: http://cns.shadrinsk.net				##
	##	home phone: (35253)6-29-77				##
	##								##
	##	------------------------------------------------	##
	##								##
	##								##
	##################################################################

?>

<html>
 <head>
  <title>��������� �������</title>
 </head>
 <body>
  <center>
   <h3>������ ���������� HTML ������� �� ������������ �������</h3>
   <br>
     ����������� Gif ����, ������� <= <?=$conf['width']?>, ������� <= <?=$conf['height']?>
   </br>
   <form action = './cns.php' method = 'post' enctype="multipart/form-data">
   <table align = 'center' border = '1'>
    <tr>
     <td colspan = '2'><input type = 'file' name = 'img'></td>
    </tr>
    <tr>
     <td>������ ����� �������</td><td><select name = 'td_size'>
	<?
	for ($n = 1; $n <= $conf['size']; $n++)
	{
	?>
	 <option value = '<?=$n?>'><?=$n?> px</option>
	<?
	}
	?>
        </select></td>
    </tr>
    <tr>
     <td>CELLSPACING �������</td><td><select name = 'cellpac' >
	<?
	for ($n = 0; $n <= $conf['cellpac']; $n++)
	{
	?>
	 <option value = '<?=$n?>'><?=$n?> px</option>
	<?
	}
	?>
        </select></td>
    
    </tr>
    <tr>
     <td>CELLSPADING �������</td><td><select name = 'cellpad' >
	<?
	for ($n = 0; $n <= $conf['cellpad']; $n++)
	{
	?>
	 <option value = '<?=$n?>'><?=$n?> px</option>
	<?
	}
	?>
        </select></td>
    
    </tr>
    <tr>
     <td colspan = '2'><input type = 'submit' value = '��������� �������' style = 'width:100%'></td>
    </tr>
    </table>
   </form>
  </center>  
 </body>
</html>