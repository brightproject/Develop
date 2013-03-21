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


# подключаем файл настроек
require './config.php';


############################################
# функция для настроек REGISTER GLOBAL = OFF
# переменные берем из суперглобальных массивов
regvar('img', 'td_size', 'cellpac', 'cellpad');
############################################




GenerateTable($img, $td_size, $cellpac, $cellpad);


/*
echo $img['tmp_name'].' img<br>';
echo $td_size.' size<br>';
echo $cellpac.' cellpac<br>';
echo $cellpad.' cellpad<br>';
*/



############################################
# Функция генерации таблицы из изображения
function GenerateTable($img, $td_size, $cellpac, $cellpad)
{
 global $conf;


 $err = '';

 if (!($image = @imagecreatefromGif($img['tmp_name'])))
 {
	$err = 'Неудача при попытки открыть файл, возможно неверный тип,<br> разрешена обработка только GIF файлов<br>';
 }

 # константы размера GIF-ки
 define('WID', 0);
 define('HEI', 1);

 $size = getimagesize($img['tmp_name']);

 #echo $size[WID].':'.$size[HEI].'<br>';


 if ($size[WID] > $conf['width'])
 {
 	$err .= 'Ширина > '.$conf['width'].'<br>';
 }
 if ($size[HEI] > $conf['height'])
 {
 	$err .= 'Высота > '.$conf['width'].'<br>';
 }
 if ($td_size > $conf['size'] || $td_size < 1)
 {
 	$err .= 'Неверное значение размера ячеек таблицы<br>';
 }
 if ($cellpac > $conf['cellpac'] || $cellpac < 0)
 {
 	$err .= 'Неверное значение CELLSPACING таблицы<br>';
 }
 if ($cellpad > $conf['cellpad'] || $cellpad < 0)
 {
 	$err .= 'Неверное значение CELLSPADING таблицы<br>';
 }


 if (strlen($err) == 0)
 {

  echo "<table align=center border=0 CELLSPACING=".$cellpac." CELLPADDING=".$cellpad.">\n";

  for ($y = 0 ; $y < $size[HEI] ; $y++)
  {
   echo "<tr>\n";
  	for ($x = 0 ; $x < $size[WID] ; $x++)
  	{
		$rgb = imagecolorat($image, $x, $y);
		list($r,$g,$b)=array_values(imageColorsForIndex($image, $rgb));

  	 echo "<td bgcolor=#".RGB_HEX($r).RGB_HEX($g).RGB_HEX($b)." width=".$td_size." height=".$td_size."></td>\n";
  	}
   echo "</tr>\n";
  }

  echo "</table>\n";

#  echo "R=$r, g=$g, b=$b<br>";
#  echo '#'.RGB_HEX($r).RGB_HEX($g).RGB_HEX($b);


 }
 else
 {
  echo "<center>Ошибка!:<br><font color = 'red'>".$err."</font><br>Вернитесь <a href = './index.php'>&lt;&lt;Назад</a> и повторите попытку</center>";
 }




}
############################################
# функция перевода из RGB - HEX

function RGB_HEX($n)
{

	$n = dechex($n);
	if (strlen($n) == 1) {$n = '0'.$n;}

	return $n;
}



############################################
# функция для настроек REGISTER GLOBAL = OFF
# переменные берем из суперглобальных массивов

function regvar()
{
    $cnt=func_num_args();
    for($i=0; $i<$cnt; $i++) {
        $varname=func_get_arg($i);
        global $$varname;
        if(isset($_GET[$varname]))
            $$varname=$_GET[$varname];
        elseif(isset($_POST[$varname]))
            $$varname=$_POST[$varname];
        elseif(isset($_COOKIE[$varname]))
            $$varname=$_COOKIE[$varname];
        elseif(isset($_FILES[$varname]))
            $$varname=$_FILES[$varname];
        else
            unset($$varname);

        if(isset($$varname)&&get_magic_quotes_gpc() && !isset($_FILES[$varname]))
            $$varname=stripslashes($$varname);
    }
}



?>