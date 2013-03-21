<?
	##################################################################
	##		Copyright by [CNS]BrainPhP (2007 г.)		##
	##								##
	##			PictireScaningForTable			##
	##			       PSFT v1.0			##
	##								##
	##		[CNS] - клан разработчика			##
	##		Brain - логин разработчика			##
	##		PhP   - доминирующий язык разработки		##
	##								##
	##		realname: Старцев Павел Вячеславович		##
	##								##
	##	------------------------------------------------	##
	##			Связь с автором:			##
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
  <title>Загрузите рисунок</title>
 </head>
 <body>
  <center>
   <h3>Скрипт генерирует HTML таблицу из загруженного рисунка</h3>
   <br>
     Используйте Gif файл, шириной <= <?=$conf['width']?>, высотой <= <?=$conf['height']?>
   </br>
   <form action = './cns.php' method = 'post' enctype="multipart/form-data">
   <table align = 'center' border = '1'>
    <tr>
     <td colspan = '2'><input type = 'file' name = 'img'></td>
    </tr>
    <tr>
     <td>размер ячеек таблицы</td><td><select name = 'td_size'>
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
     <td>CELLSPACING таблицы</td><td><select name = 'cellpac' >
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
     <td>CELLSPADING таблицы</td><td><select name = 'cellpad' >
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
     <td colspan = '2'><input type = 'submit' value = 'Генерация таблицы' style = 'width:100%'></td>
    </tr>
    </table>
   </form>
  </center>  
 </body>
</html>