<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Untitled Document</title>
</head>
<style type="text/css">
body {padding:15px 40px; margin:0; font:normal 11px Tahoma, Geneva, sans-serif}
.name {width:180px; float:left; font:bold 13px/20px Tahoma; border-bottom:dashed 1px #333;}
.line {width:100%; float:left; height:10px;}
.block {width:180px; float:left}
span {color:#CCC; cursor:pointer}
span:hover {color:#333	}
</style>
<body>
<?php
	function scan_dir($dirname) { 
		global $extentions, $count;
		$dir = opendir($dirname); 
		
		while (($file = readdir($dir)) !== false) { 
			if($file != "." && $file != "..") { 
				if(is_file($dirname."/".$file)) { 
					$ext = strrchr($dirname."/".$file, "."); 
					foreach($extentions as $exten) {
						if(preg_match('#\.'.$exten.'#is', $ext)) {
							$content = file($dirname."/".$file); 
							foreach($content as $key => $m) {
								$count[$exten]['all'] += count($key);
								if(strlen(trim($m)) > 0) {
									$count[$exten]['nonull'] += count($key);
								}
								else {
									$count[$exten]['null']++;
								}
							}
							unset($content);
						}
					}
				}
				if(is_dir($dirname."/".$file)) { 
					scan_dir($dirname."/".$file); 
				} 
			} 
		} 
		closedir($dir); 
	} 
	
	$dirname = "."; 
	$extentions = array('php', 'css', 'tpl', 'js'); 
	$k = array('all', 'null', 'nonull');
	
	foreach($extentions as $exten) {
		foreach($k as $key) {
			$count[$exten][$key] = 0;
		}
	}
	
	scan_dir($dirname);
	$all = $all_null = $all_nonull = 0;
	foreach($extentions as $exten) {
		$all += $count[$exten]['all'];
		$all_null += $count[$exten]['null'];
		$all_nonull += $count[$exten]['nonull'];
	}
	
	$per1 = round(($all_null / $all) * 100);
	
	echo '<div class="name">�����</div>
	      <div class="line"></div>
		  <div class="block">
	        ����� �����: <strong>'.$all.'</strong><br />'.
		   '������ �����: <strong>'.$all_null.' - <span>'.$per1.'%</span></strong><br />'.
		   '���������� �����: <strong>'.$all_nonull.' - <span>'.(100 - $per1).'%</strong>
		 </div>
		 <div class="line"></div><div class="line"></div><div class="line"></div>';
	
	foreach($extentions as $exten) {
		
		$per2 = round(($count[$exten]['null'] / $count[$exten]['all'])  * 100);
		
		echo '<div class="name">����������: '.$exten.'</div>
		      <div class="line"></div>
			  <div class="block">
		        ����� �����: <strong>'.$count[$exten]['all'].'</strong><br />'.
			   '������ �����: <strong>'.$count[$exten]['null'].' - <span>'.$per2.'%</span></strong><br />'.
			   '������ ���: <strong>'.$count[$exten]['nonull'].' - <span>'.(100 - $per2).'%</span></strong>
			 </div>
			 <div class="line"></div><div class="line"></div><div class="line"></div>';
	}
?>
</body>
</html>
