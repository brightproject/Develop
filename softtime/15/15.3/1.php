<?php
  // ��� ��������
  $dirname = "img";
  // ��������� �������
  $dir = opendir($dirname);

  echo "<table border=1>";
  echo "<tr>
          <td>����</td>
          <td>������</td>
          <td>������</td>
        </tr>";

  // ������ ���������� ��������
  while(($file = readdir($dir)) !== false)
  {
    // ���� ����� ���� ���� - ����������
    // ��� ��������� � ������� ������ �������
    if(is_file("$dirname/$file"))
    {
      list($width, $height) = getimagesize("$dirname/$file");
      echo "<tr>
              <td>$file</td>
              <td>$width</td>
              <td>$height</td>
            </tr>";
    }
  }

  echo "</table>";

  // ��������� �������
  closedir($dir);
?>
