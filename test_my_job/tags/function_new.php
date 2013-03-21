<?php 
function query($q)
{
	return mysql_query($q);
}
function get_row($q)
{
	return mysql_fetch_assoc($q);	
}
function get_array($q)
{	
	while($a = mysql_fetch_assoc($q)){
		$arr[] = $a;
	}
	return $arr;	
	//return mysql_fetch_array($q);	
}
?>