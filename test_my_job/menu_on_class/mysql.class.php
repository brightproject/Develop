<?
class db_class
{
	var $db_id = false;
	var $connected = false;
	
	function query($query, $show_error=true)
	{
		//���� �� ����������
		if(!$this->connected) $this->connect(DB_USER, DB_PASS, DB_NAME, DB_SERVER);
		
		//������ ������
		if(!($this->query_id = mysql_query($query, $this->db_id) ))
			die ('������ � �������');
		
		//���������� ���������
		return $this->query_id;
	}
	
	function connect($db_user, $db_pass, $db_name, $db_location = 'localhost')
	{
		//������������
		if(!$this->db_id = mysql_connect($db_location, $db_user, $db_pass)) 
			die('�� �����������');
		//�������� ��
		if(!@mysql_select_db($db_name, $this->db_id)) 
			die('��� ��');
		//��� ���������(�� ������)
		$this->mysql_version = mysql_get_server_info();

		if(!defined('COLLATE'))
			define ("COLLATE", "utf8_general_ci");

		if (version_compare($this->mysql_version, '4.1', ">=")) mysql_query("/*!40101 SET NAMES '" . COLLATE . "' */");

		//������������� ���������� ���������� �������� ��� ��� )
		$this->connected = true;

		return true;
	}
	
	//�������� ������ ���
	function get_row($query_id = '')
	{
		//���� �� ������� ������, �� ����� ���������
		if ($query_id == '') $query_id = $this->query_id;

		return mysql_fetch_assoc($query_id);
	}
	function close()
	{
		//��������� ��
		@mysql_close($this->db_id);
	}

}
	


?>