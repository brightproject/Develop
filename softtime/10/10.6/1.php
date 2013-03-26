<?php
  // �������, �������������� ���������� ������, ���������� ��������� $dir
  function list_100_files($ftp_handle, $dir)
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
        $path = trim($dir."/".$file,"/");
        if($acc[0] == 'd' && $file != ".." && $file != ".")
        {
          // ���� ����� ���� �������, ���������� �������� �������
          $global_size = list_100_files($ftp_handle, 
                                        $path);
        }
        else
        {
          // ���� ����� ���� ����, ��������� ��� �����
          if($global_size > 102400) echo "$path<br>";
        }
      }
    }
    return $global_size;
  }
?>
