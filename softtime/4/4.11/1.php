<form enctype='multipart/form-data' method=post>
<input type="file" name="mp3"><br>
<input type=submit value='���������'>
</form>
<?php
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ���������� HTML-�����
  if(!empty($_FILES))
  {
    // ���������, �������� �� ���������� ���� mp3-������
    if($_FILES['mp3']['type'] == 'audio/mpeg')
    {
      // ������ ���������� �����
      $content = file_get_contents($_FILES['mp3']['tmp_name']);
      // ���������� ���� �� ��������� ��������
      unlink($_FILES['mp3']['tmp_name']);

      // ���������� ����������� � �������� ���������� �����
      $content = mysql_escape_string($content);

      // ��������� ������ �� ���������� ����� � �������
      $query = "INSERT INTO mp3 VALUES
                (NULL, '".$_FILES['mp3']['name']."', '$content')";
      if(mysql_query($query))
      {
        // ������������ �������������� ������������ ��������
        // ��� ������� POST-������
        echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
             </HEAD></HTML>";
      } else exit(mysql_error());
    }
  }

  // ������� ������ ������
  $query = "SELECT * FROM mp3";
  $mp = mysql_query($query);
  if(!$mp) exit(mysql_error());
  // ���� ������� ���� �� ���� ������,
  // �������  
  if(mysql_num_rows($mp) > 0)
  {
    while($mp3 = mysql_fetch_array($mp))
    {
      echo "<a href=get.php?id_mp3=$mp3[id_mp3]>$mp3[name]</a><br>";
    }
  }
?>
