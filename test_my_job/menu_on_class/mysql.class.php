<?
class db_class
{
	var $db_id = false;
	var $connected = false;
	
	function query($query, $show_error=true)
	{
		//если не подключены
		if(!$this->connected) $this->connect(DB_USER, DB_PASS, DB_NAME, DB_SERVER);
		
		//делаем запрос
		if(!($this->query_id = mysql_query($query, $this->db_id) ))
			die ('Ошибка в запросе');
		
		//возвращаем результат
		return $this->query_id;
	}
	
	function connect($db_user, $db_pass, $db_name, $db_location = 'localhost')
	{
		//подключаемся
		if(!$this->db_id = mysql_connect($db_location, $db_user, $db_pass)) 
			die('Не подключился');
		//выбираем БД
		if(!@mysql_select_db($db_name, $this->db_id)) 
			die('Нет БД');
		//для кодировки(не вникай)
		$this->mysql_version = mysql_get_server_info();

		if(!defined('COLLATE'))
			define ("COLLATE", "utf8_general_ci");

		if (version_compare($this->mysql_version, '4.1', ">=")) mysql_query("/*!40101 SET NAMES '" . COLLATE . "' */");

		//устанавливаем глобальную переменную коннекта как ТРУ )
		$this->connected = true;

		return true;
	}
	
	//получаем список стр
	function get_row($query_id = '')
	{
		//если не передан запрос, то юзаем последний
		if ($query_id == '') $query_id = $this->query_id;

		return mysql_fetch_assoc($query_id);
	}
	function close()
	{
		//закрываем БД
		@mysql_close($this->db_id);
	}

}
	


?>