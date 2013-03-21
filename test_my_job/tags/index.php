<?php   
   //TagClouds
	require_once ("connection.php"); 
	require_once ("mysql.class.php");
	$db = new db_class;
	$sql = $db->query("SELECT * FROM test_tags LIMIT 4");
	while ($row = $db->get_row($sql))
	
			{
				$str .=$row['tag'].',';
				//if (substr($str, strlen($str)-1) == ",") $str = substr($str, 0, strlen($str)-1);”даление последней зап€той
			}
		//”бираем зап€тую
	//разбиваем строку
	$res = explode(',', $str);
	//удал€ем лишние пробелы
	// for ($i = 0; $i < count($res); $i++) {
	// $res[$i] = trim($res[$i]);
	// echo "<br />".$res[$i]."<br /><br />";
	// }
    $res = explode(',', $str);
    for( $i = 0; $i < count($res); $i++ )
        if($res[$i] != ' ' and $res[$i]) $array[] = trim($res[$i]);
		//¬ыводим облако тегов
	//$tags=array('php','html','php','css','javascript','php','html','php');	
	//$tags= $array[$i];
	//$tags=array($res[$i]);
	$array = array_values($array);
	$tags=array_count_values($array);//$tags=array('php'=>4,'html'=>2,'css'=>1,'javascript'=>1);
	$avg=array_sum($tags)/count($tags);//$avg=8/4;$avg=2;
	$a = .7;//множитель
	$b = .5;//число em
	
		$output_tag .= "<div id=\"oblakoInfo\">";
	foreach($tags as $tag => $num)
	{
        $output_tag .= "<span style=\"font-size:".($num * $a / $avg + $b)."em;\">
	<a href=\"index.php?tags=".urlencode($tag)."\">{$tag}</a> </span>";
	}
        $output_tag .= "</div>";
      //вывод страницы с тегами
	      	$sql = $db->query("SELECT * FROM test_tags WHERE tag LIKE '%".$_GET['tags']."%'");
	      	//LIKE '%".$getpage['tag']."%'");
	      	//LIKE '%.{$getpage['tag']}.%'");
	      	//$_GET['id']
			while ($row = $db->get_row($sql))
			{
			$text_tag .= "<br /><a href=\"index.php\">".$row['title']."</a><br />";
			}
?>


<?php 
		if(!($_GET['tags']))
		{
			echo $output_tag; 
		} else {
		echo $text_tag;
		}
?>