<?php 
  // ������������� ���������� � ����� ������
  require_once("config.php");
  // ���� ������������ �� ������������� - ������������
  if(!isset($_SERVER['PHP_AUTH_USER'])) 
  { 
    Header("WWW-Authenticate: Basic realm=\"Admin Page\""); 
    Header("HTTP/1.0 401 Unauthorized"); 
    exit(); 
  } 
  else 
  { 
    // ��������� ���������� $_SERVER['PHP_AUTH_USER'] �
    // $_SERVER['PHP_AUTH_PW'], ����� ������������� 
    // SQL-��������
    if (!get_magic_quotes_gpc())
    {
      $_SERVER['PHP_AUTH_USER'] = 
                          mysql_escape_string($_SERVER['PHP_AUTH_USER']);
      $_SERVER['PHP_AUTH_PW'] = 
                          mysql_escape_string($_SERVER['PHP_AUTH_PW']);
    }
    
    $query = "SELECT pass FROM userlist 
              WHERE name='".$_SERVER['PHP_AUTH_USER']."'";
    $lst = @mysql_query($query); 
    // ���� ������ � SQL-������� - ������ ���������� ���� ����� ������
    if(!$lst)
    {
      Header("WWW-Authenticate: Basic realm=\"Admin Page\""); 
      Header("HTTP/1.0 401 Unauthorized"); 
      exit(); 
    }
    // ���� ������ ������������ ��� - ������ ���������� ���� ����� ������
    if(mysql_num_rows($lst) == 0)
    {
      Header("WWW-Authenticate: Basic realm=\"Admin Page\""); 
      Header("HTTP/1.0 401 Unauthorized"); 
      exit(); 
    }
    // ���� ��� �������� ��������, ���������� ���� �������
    $pass = @mysql_fetch_array($lst);
    if(md5($_SERVER['PHP_AUTH_PW']) != $pass['pass'])
    {
      Header("WWW-Authenticate: Basic realm=\"Admin Page\""); 
      Header("HTTP/1.0 401 Unauthorized"); 
      exit(); 
    }
  }
?>
