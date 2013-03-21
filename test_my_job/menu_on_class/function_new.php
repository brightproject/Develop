<?php 
function query($q)
{
	return mysql_query($q);
}
function get_row($q)
{
	return mysql_fetch_assoc($q);	
}
?>