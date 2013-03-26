<?php
echo getfilesize($_GET['name']);
// ������� ����������� ������� �����
function getfilesize($filename)
{
  // ���������, ���������� �� ����
  if(!file_exists($filename)) return "���� �� ����������";
  // ���������� ������ �����
  $filesize = filesize($filename);
  // ���� ������ ���� ��������� 1024 �����,
  // ������������� ������ � ������
  if($filesize > 1024)
  {
    $filesize = (float)($filesize/1024);
    // ���� ������ ���� ��������� 1024 ������,
    // ������������� ������ � ������
    if($filesize > 1024)
    {
      $filesize = (float)($filesize/1024);
      // ��������� ������� ����� ��
      // ������� ����� ����� �������
      $filesize = round($filesize, 1);
      return $filesize." ��";
    }
    else
    {
      // ��������� ������� ����� ��
      // ������� ����� ����� �������
      $filesize = round($filesize, 1);
      return $filesize." ��";
    }
  }
  else
  {
    return $filesize." ����";
  }
}
?>
