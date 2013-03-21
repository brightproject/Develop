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


# ���������� ���� ��������
require './config.php';


############################################
# ������� ��� �������� REGISTER GLOBAL = OFF
# ���������� ����� �� ��������������� ��������
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
# ������� ��������� ������� �� �����������
function GenerateTable($img, $td_size, $cellpac, $cellpad)
{
 global $conf;


 $err = '';

 if (!($image = @imagecreatefromGif($img['tmp_name'])))
 {
	$err = '������� ��� ������� ������� ����, �������� �������� ���,<br> ��������� ��������� ������ GIF ������<br>';
 }

 # ��������� ������� GIF-��
 define('WID', 0);
 define('HEI', 1);

 $size = getimagesize($img['tmp_name']);

 #echo $size[WID].':'.$size[HEI].'<br>';


 if ($size[WID] > $conf['width'])
 {
 	$err .= '������ > '.$conf['width'].'<br>';
 }
 if ($size[HEI] > $conf['height'])
 {
 	$err .= '������ > '.$conf['width'].'<br>';
 }
 if ($td_size > $conf['size'] || $td_size < 1)
 {
 	$err .= '�������� �������� ������� ����� �������<br>';
 }
 if ($cellpac > $conf['cellpac'] || $cellpac < 0)
 {
 	$err .= '�������� �������� CELLSPACING �������<br>';
 }
 if ($cellpad > $conf['cellpad'] || $cellpad < 0)
 {
 	$err .= '�������� �������� CELLSPADING �������<br>';
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
  echo "<center>������!:<br><font color = 'red'>".$err."</font><br>��������� <a href = './index.php'>&lt;&lt;�����</a> � ��������� �������</center>";
 }




}
############################################
# ������� �������� �� RGB - HEX

function RGB_HEX($n)
{

	$n = dechex($n);
	if (strlen($n) == 1) {$n = '0'.$n;}

	return $n;
}



############################################
# ������� ��� �������� REGISTER GLOBAL = OFF
# ���������� ����� �� ��������������� ��������

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