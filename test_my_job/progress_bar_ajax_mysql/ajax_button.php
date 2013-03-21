<?
if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest')
{
    header ('Content-type: text/html; charset=windows-1251');
	//Увеличиваем массив
    $postpage = array(
        'par' => mysql_escape_string($_POST['par']),
        'act' => mysql_escape_string($_POST['act']),
    );
    //Подключаемся к БД
    $db = mysql_connect("localhost", "root","" );
    mysql_select_db("test_ajax", $db);
   //Условие первое 
    if($postpage['act'] == 'min')
    {
        $sql = mysql_query('SELECT parametr FROM test_bar WHERE id = "1" ');
        $row = mysql_fetch_array($sql);
        if($row['parametr'] < 100)
            mysql_query(" UPDATE test_bar SET parametr = parametr + ".$postpage['par']." WHERE id = '1' ");
    }
    else if($postpage['act'] == 'max')
    {
        $sql = mysql_query('SELECT parametr FROM test_bar WHERE id = "1" ');
        $row = mysql_fetch_array($sql);
        if($row['parametr'] > 0)
            mysql_query(" UPDATE test_bar SET parametr = parametr - ".$postpage['par']." WHERE id = '1' ");
    }
}
?>