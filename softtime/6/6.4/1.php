<?php
if(!isset($_GET['probe']))
{
  // ������������� cookie � ������ "test"
  if(setcookie("test","set"))
  {
    // �������� ��������� ������������� �� ��������,
    // � ������� ����� ����������� ������� ���������� cookie 
    header("Location: $_SERVER[PHP_SELF]?probe=set");
  }
}
else
{
  if(!isset($_COOKIE["test"]))
  {
    echo("��� ���������� ������ ���������� ���������� �������� cookie");
  }
  else
  {
    // cookie ��������, ��������� �� ������ ��������,
    // ������ ���������, ���������� ����� ������ �������� 
    header("Location: $_SERVER[PHP_SELF]");
  }
}
?>
