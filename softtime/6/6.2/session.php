<?php
  // ��������� ������ 
  function open($save_path, $session_name) 
  {

    // ������� ����� MySQL-������� 
    $dblocation = "localhost";
    // ��� ���� ������
    $dbname = "puzzles";
    // ������������
    $dbuser = "root";
    // ��� ������
    $dbpasswd = "";
    // ������������� ���������� � ����� ������
    $dbcnx = mysql_connect($dblocation,$dbuser,$dbpasswd);
    if (!$dbcnx)
      exit ("� ���������, ���������� ������ MySQL : ".mysql_error());
    // �������� ���� ������
    if (!@mysql_select_db($dbname,$dbcnx))
      exit("� ���������, ���������� ���� ������ : ".mysql_error());
    
    // ������������� ��������� ����������
    @mysql_query("SET NAMES cp1251");

    return true;
  }

  function close() 
  {
    // ��������� ���������� � ����� ������
    mysql_close();

    return true;
  }

  function read($id) 
  {
    // ������ ������ ������
    $query = "SELECT value FROM session WHERE session = '$id'";
    $ses = mysql_query($query);
    if(!$ses) exit(mysql_error());
    $session = mysql_fetch_array($ses);

    // ���������� ������, ���������� � ������
    return $session['value'];
  }

  function write($id, $sess_data) 
  {
    // ���������, �� ���������������� �� ������
    // � ����� ������
    $query = "SELECT COUNT(*) FROM session WHERE session = '$id'";
    $ses = mysql_query($query);
    if(!$ses) exit(mysql_error());
    if(mysql_result($ses,0) > 0)
    {
      // ����� ������ ��� ����������, ����������
      // �������� ����� ��������� � ������
      $query = "UPDATE session SET putdate = NOW(),
                                   value = '$sess_data' 
                WHERE session = '$id'";
      if(!mysql_query($query)) exit(mysql_error());
      return false;
    }
    else
    {
      // ��� ������ ��������� � ������, ����������
      // �� ���������������� � ���� ������
      $query = "INSERT INTO session 
                VALUES (NULL,'$id', NOW(), '$sess_data')"; 
      $ses = mysql_query($query);
      if(!$ses) exit(mysql_error());
      return true;
    } 
  }

  function destroy($id) 
  {
    // ������� ������ � ��������������� $id
    $query = "DELETE FROM session WHERE session = '$id'"; 
    if(!mysql_query($query)) exit(mysql_error());
    return true;
  }

  function gc($maxlifetime) 
  {
    // ��������� "������ ������" - �������
    // ������ ������
    $query = "DELETE FROM session 
              WHERE putdate < NOW() - INTERVAL 20 MINUTE";
    if(!mysql_query($query)) exit(mysql_error());
    return true;
  }

  session_set_save_handler("open", 
                           "close",
                           "read", 
                           "write", 
                           "destroy", 
                           "gc");

  session_start();
?>
