<?
if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest')
{
    header ('Content-type: text/html; charset=windows-1251');
	//Увеличиваем массив
    $postpage = array(
        'par_1' => mysql_escape_string($_POST['par_1']),
        'act_1' => mysql_escape_string($_POST['act_1']),
        'par_2' => mysql_escape_string($_POST['par_2']),
        'act_2' => mysql_escape_string($_POST['act_2']),
        'par_3' => mysql_escape_string($_POST['par_3']),
        'act_3' => mysql_escape_string($_POST['act_3']),
    );
    //Подключаемся к БД
    $db = mysql_connect("localhost", "root","" );
    mysql_select_db("testing", $db);
   //Условие первое 
    if($postpage['act_1'] == 'min')
    {
        $sql = mysql_query('SELECT parametr_1 FROM test_progress_bar WHERE id = "1" ');
        $row = mysql_fetch_array($sql);
        if($row['parametr_1'] < 100)
            mysql_query(" UPDATE test_progress_bar SET parametr_1 = parametr_1 + ".$postpage['par_1']." WHERE id = '1' ");
    }
    else if($postpage['act_1'] == 'max')
    {
        $sql = mysql_query('SELECT parametr_1 FROM test_progress_bar WHERE id = "1" ');
        $row = mysql_fetch_array($sql);
        if($row['parametr_1'] > 0)
            mysql_query(" UPDATE test_progress_bar SET parametr_1 = parametr_1 - ".$postpage['par_1']." WHERE id = '1' ");
    }
	
	//Условие второе 
    if($postpage['act_2'] == 'min')
    {
        $sql = mysql_query('SELECT parametr_2 FROM test_progress_bar WHERE id = "1" ');
        $row = mysql_fetch_array($sql);
        if($row['parametr_2'] < 100)
            mysql_query(" UPDATE test_progress_bar SET parametr_2 = parametr_2 + ".$postpage['par_2']." WHERE id = '1' ");
    }
    else if($postpage['act_2'] == 'max')
    {
        $sql = mysql_query('SELECT parametr_2 FROM test_progress_bar WHERE id = "1" ');
        $row = mysql_fetch_array($sql);
        if($row['parametr_2'] > 0)
            mysql_query(" UPDATE test_progress_bar SET parametr_2 = parametr_2 - ".$postpage['par_2']." WHERE id = '1' ");
    }
	//Условие третье - когда появиться еще бар!!!

    if($postpage['act_3'] == 'min')
    {
        $sql = mysql_query('SELECT parametr_3 FROM test_progress_bar WHERE id = "1" ');
        $row = mysql_fetch_array($sql);
        if($row['parametr_3'] < 100)
            mysql_query(" UPDATE test_progress_bar SET parametr_3 = parametr_3 + ".$postpage['par_3']." WHERE id = '1' ");
    }
    else if($postpage['act_3'] == 'max')
    {
        $sql = mysql_query('SELECT parametr_3 FROM test_progress_bar WHERE id = "1" ');
        $row = mysql_fetch_array($sql);
        if($row['parametr_3'] > 0)
            mysql_query(" UPDATE test_progress_bar SET parametr_3 = parametr_3 - ".$postpage['par_3']." WHERE id = '1' ");
    }
}
?>