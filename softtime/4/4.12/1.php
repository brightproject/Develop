<form enctype='multipart/form-data' method=post>
<input type="file" name="image"><br>
<input type=submit value='���������'>
</form>
<?php
  // ���������� ����������� �� ��������
  $pnumber = 3;

  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ���������� HTML-�����
  if(!empty($_FILES))
  {
    // ���������, �������� �� ���������� ���� �����������
    if(substr($_FILES['image']['type'],0,5) == 'image')
    {
      // ������ ���������� �����
      $content = file_get_contents($_FILES['image']['tmp_name']);
      // ���������� ���� �� ��������� ��������
      unlink($_FILES['image']['tmp_name']);

      // ���������� ����������� � �������� ���������� �����
      $content = mysql_escape_string($content);

      // ��������� ������ �� ���������� ����� � �������
      $query = "INSERT INTO image VALUES(NULL,
                                         '".$_FILES['image']['name']."',
                                         '$content')";
      if(mysql_query($query))
      {
        // ������������ �������������� ������������ ��������
        echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
             </HEAD></HTML>";
      } else exit(mysql_error());
    }
  }

  // ���������, ������� �� ����� ������� ��������
  if(isset($_GET['page'])) $page = $_GET['page'];
  else $page = 1;

  // ��������� �������
  $start = (($page - 1)*$pnumber + 1);

  // ������� ������ ������
  $query = "SELECT * FROM image LIMIT $start, $pnumber";
  $img = mysql_query($query);
  if(!$img) exit(mysql_error());
  // ���� ������� ���� �� ���� ������,
  // ������� 
  if(mysql_num_rows($img) > 0)
  {
    while($image = mysql_fetch_array($img))
    {
      echo "<img src=get.php?id_image=$image[id_image]>&nbsp;";
    }
  }
  echo "<br><br>";

  // ���������� �������
  $query = "SELECT COUNT(*) FROM image";
  $tot = mysql_query($query);
  if(!$tot) exit(mysql_error());
  $total = mysql_result($tot,0);
  $number = (int)($total/$pnumber);
  if((float)($total/$pnumber) - $number != 0) $number++;

  // ������������ ���������
  for($i = 1; $i <= $number; $i++)
  {
    if($i != $number)
    {
      if($page == $i)
      {
        echo "[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;";
      }
      else
      {
        echo "<a href=$_SERVER[PHP_SELF]?page=".$i.
             ">[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</a>&nbsp;";
      }
    }
    else
    {
      if($page == $i)
      {
        echo "[".(($i - 1)*$pnumber + 1)."-".($total - 1)."]&nbsp;";
      }
      else
      {
        echo "<a href=$_SERVER[PHP_SELF]?page=".$i.
             ">[".(($i - 1)*$pnumber + 1)."-".($total - 1)."]</a>&nbsp;";
      }
    }
  }
?>
