<?php
  // �������, �������������� ���������� ������, ���������� ��������� $dir
  function get_ftp_size($ftp_handle, $dir, $global_size = 0)
  {
    $file_list = ftp_rawlist($ftp_handle, $dir);
    if(!empty($file_list))
    {
      foreach($file_list as $file)
      {
        // ��������� ������ �� ���������� ��������
        list($acc,
             $bloks,
             $group,
             $user,
             $size, 
             $month, 
             $day, 
             $year, 
             $file) = preg_split("/[\s]+/", $file);
        if($acc[0] == 'd' && $file != ".." && $file != ".")
        {
          // ���� ����� ���� �������, ���������� �������� ���
          // ���� ������� get_ftp_size()
          $dir_new = trim($dir."/".$file,"/");
          $global_size = get_ftp_size($ftp_handle, 
                                      $dir_new, 
                                      $global_size);
        }
        else
        {
          // ���� ����� ���� ����, ��������� ��� �����
          $global_size += $size;
        }
      }
    }
    return $global_size;
  }
?>
