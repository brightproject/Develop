<?php 
  // �������� ������ 
  session_start(); 
  // �������� ���������� id ������ 
  $id_session = session_id(); 
  // ������������� ���������� � ����� ������
  include "config.php";
  // ���������, ������������ �� ����� id � ���� ������ 
  $query = "SELECT * FROM session 
            WHERE id_session = '$id_session'"; 
  $ses = mysql_query($query); 
  if(!$ses) exit("<p>������ � ������� � ������� ������</p>"); 
  // ���� ������ � ����� ������� ��� ����������, 
  // ������, ������������ online - ��������� ����� ��� 
  // ���������� ��������� 
  if(mysql_num_rows($ses)>0) 
  { 
    $query = "UPDATE session SET putdate = NOW(),
                                 user = '$_SESSION[user]' 
              WHERE id_session = '$id_session'"; 
    mysql_query($query); 
  } 
  // �����, ���� ������ ������ ��� - ���������� ������ ��� 
  // ����� - �������� � ������� ������ ���������� 
  else 
  { 
    $query = "INSERT INTO session 
              VALUES('$id_session', NOW(), '$_SESSION[user]')"; 
    if(!mysql_query($query)) 
    { 
      echo $query."<br>"; 
      echo "<p>������ ��� ���������� ������������</p>"; 
      exit(); 
    } 
  } 
  // ����� �������, ��� ������������, ������� ������������� 
  // � ������� 20 �����, �������� ������ - ������� �� 
  // id_session �� ���� ������ 
  $query = "DELETE FROM session 
            WHERE putdate < NOW() -  INTERVAL '20' MINUTE"; 
  mysql_query($query); 
?>
