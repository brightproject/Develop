<?php 
  // �������� ���������� �������� home � home2 
  lowering("home","home2"); 
  ////////////////////////////////////////////////////////// 
  // ����������� ������� ������ 
  ////////////////////////////////////////////////////////// 
  function lowering($dirname,$dirdestination) 
  { 
    // ��������� ������� 
    $dir = opendir($dirname); 
    // � ����� ������� ��� ���������� 
    while (($file = readdir($dir)) !== false) 
    { 
      echo $file."<br>"; 
      if(is_file("$dirname/$file")) 
      { 
        copy("$dirname/$file.", "$dirdestination/$file"); 
      } 
      // ���� ��� ������� - ������� ��� 
      if(is_dir("$dirname/$file") && 
         $file != "." && 
         $file != "..") 
      { 
        // ������� ������� 
        if(!mkdir($dirdestination."/".$file)) 
        { 
          echo "���������� ������� ������� $dirdestination/$file"; 
        } 
        // �������� ���������� ������� lowering 
        lowering("$dirname/$file", "$dirdestination/$file"); 
      } 
    } 
    // ��������� ������� 
    closedir($dir); 
  } 
?>
