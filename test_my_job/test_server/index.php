<?
/*
+-------------------------------------+
|  PHPShop Software                   |
|  Тест системных требований          |
+-------------------------------------+
*/

// Выключаем ошибки
error_reporting(0);

// Глобалсы
if(ini_get('register_globals') == 1) $register_globals="............<img src=\"rewritemodtest/icon-activate.gif\" border=0 align=absmiddle> <b class='ok'>Ok</b>";
  else $register_globals="............<img src=\"rewritemodtest/errormessage.gif\"  border=0 align=absmiddle> <b class='error'>Error</b>";

// Апач
if(eregi('Apache', $_SERVER['SERVER_SOFTWARE'])) $API="............<img src=\"rewritemodtest/icon-activate.gif\" border=0 align=absmiddle> <b class='ok'>Ok</b>";
  else $API="............<img src=\"rewritemodtest/errormessage.gif\"  border=0 align=absmiddle> <b class='error'>Error</b>";

// Версия PHP
$phpversion=substr(phpversion(),0,1);
if($phpversion >= 4) $php="............<img src=\"rewritemodtest/icon-activate.gif\" border=0 align=absmiddle> <b class='ok'>Ok</b>";
  else $php="............<img src=\"rewritemodtest/errormessage.gif\"  border=0 align=absmiddle> <b class='error'>Error</b>";

// Rewrite
$path_parts = pathinfo($PHP_SELF);
$filename =  "http://".$_SERVER['SERVER_NAME'].$path_parts['dirname']."/rewritemodtest/test.html";
if (@fopen($filename,"r")) $rewrite="............<img src=\"rewritemodtest/icon-activate.gif\" border=0 align=absmiddle> <b class='ok'>Ok</b>";
  else $rewrite="............<img src=\"rewritemodtest/errormessage.gif\"  border=0 align=absmiddle> <b class='error'>Error</b> <a href=\"./rewritemodtest/work.html\" target=\"_blank\" title=\"Ручная проверка\">[проверка]</a>";

// Версия Zend
$filename =  "http://".$_SERVER['SERVER_NAME'].$path_parts['dirname']."/rewritemodtest/rewritemodtest.php";
$html = implode('', file ($filename));
if (eregi('Zend Optimizer', $html)) $zend="............<img src=\"rewritemodtest/icon-activate.gif\" border=0 align=absmiddle> <b class='ok'>Ok</b>";
   else $zend="............<img src=\"rewritemodtest/errormessage.gif\"  border=0 align=absmiddle> <b class='error'>Error</b>";

//GD Support
$GD=gd_info();
if($GD['GD Version']!="")
 $gd_support="............<img src=\"rewritemodtest/icon-activate.gif\" border=0 align=absmiddle> <b class='ok'>Ok</b>";
  else  $gd_support="............<img src=\"rewritemodtest/errormessage.gif\"  border=0 align=absmiddle> <b class='error'>Error</b>";
 
//FreeType Support
if($GD['FreeType Support'] === true)
 $gd_freetype_support="............<img src=\"rewritemodtest/icon-activate.gif\" border=0 align=absmiddle> <b class='ok'>Ok</b>";
  else  $gd_freetype_support="............<img src=\"rewritemodtest/errormessage.gif\"  border=0 align=absmiddle> <b class='error'>Error</b>";

//FreeType Linkage
if($GD['FreeType Linkage'] == "with freetype")
 $gd_freetype_linkage="............<img src=\"rewritemodtest/icon-activate.gif\" border=0 align=absmiddle> <b class='ok'>Ok</b>";
  else  $gd_freetype_linkage="............<img src=\"rewritemodtest/errormessage.gif\"  border=0 align=absmiddle> <b class='error'>Error</b>";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Тест системных требований PHPShop</title>
<META http-equiv=Content-Type content="text-html; charset=windows-1251">
<style>
.ok{
      color: green;
     font-weight: bold;
}
.error{
     color: red;
     font-weight: bold;
}
BODY {
	FONT-SIZE: 11px;
	COLOR: #000000;
	FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
}
td.{
	FONT-SIZE: 11px;
	COLOR: #000000;
}
a{
    FONT-SIZE: 10px;
	COLOR: #0066cc;
}
a:hover{
    FONT-SIZE: 10px;
	COLOR: CC6600;
}
</style>
</head>

<body>
<table width="100%" height="100%">
<tr>
	<td valign="middle" align="center">
	<FIELDSET style="width: 550px">
<div style="padding:30" align="left">
<h4>Тест системных требований PHPShop</h4>
<ol>
<li id="line1" style="visibility:hidden"> Apache => 1.3.*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$API?></li>
<li id="line2" style="visibility:hidden"> PHP => 4.* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$php?></li>
<li id="line3" style="visibility:hidden"> ZendOptimizer => 2.1.5.3 &nbsp;&nbsp;&nbsp;&nbsp;<?=$zend?></li>
<li id="line4" style="visibility:hidden"> RewriteEngine ON для Apache&nbsp;&nbsp;&nbsp;<?=$rewrite?></li>
<li id="line5" style="visibility:hidden"> Register Globals ON для PHP &nbsp;&nbsp;&nbsp;<?=$register_globals?></li>
<li id="line6" style="visibility:hidden">GD Support для PHP <?=$gd_support?></li>
<li id="line7" style="visibility:hidden">FreeType Support для PHP <?=$gd_freetype_support?></li>
<li id="line8" style="visibility:hidden">FreeType Linkage для PHP <?=$gd_freetype_linkage?></li>
<ol>
<p style="font-size: 10px" id="ras" style="visibility:visible">Расшифровка: <img src="rewritemodtest/icon-activate.gif" border=0 align=absmiddle> <b class='ok'>Ok</b> - тест пройден, 
<img src="rewritemodtest/errormessage.gif"  border=0 align=absmiddle> <b class='error'>Error</b> - тест не пройден (возможны проблемы при работе скрипта, обратитесь к документации сервера или свяжитесь с администратором сервера)<br>
<img src="rewritemodtest/php.png" border=0 align=absmiddle> <a href="rewritemodtest/rewritemodtest.php" target="_blank">Показать информацию о PHP</a>
<br><br>
* Если <strong>отключена функция fopen</strong>, то тест "RewriteEngine ON" будет пройден с ошибкой. Воспользуйтесь ручной проверкой. Если откроется страница с выводом переменных PHP, то тест пройден.<br>

</p>
</div><div align="right" style="padding: 5px;font-size: 10px">PHPShop Tester v2.0 / <?=date("r")?></div>
</FIELDSET>
	</td>
</tr>
</table>
<script>
function LoadTest(i){
document.getElementById("line"+i).style.visibility = 'visible';
if(i != 8) setTimeout("LoadTest("+(i+1)+")",500);}
setTimeout("LoadTest(1)",500);
</script>
</body>
</html>
