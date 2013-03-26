<?php
  // ��� �����
  $filename = "text.txt";
  // ���������� ������� �� ��������
  $pnumber = 3;
  // ��������� ���� ��� ������
  $bufer = file_get_contents($filename);

  // ������� ��� ������ ��� ������ ����������� ���������
  preg_match_all("#([\d]+) ([^\n]+)(\n|$)#U",
                 $bufer, 
                 $out,
                 PREG_PATTERN_ORDER);
  // ��������� ������������� ������
  for($i = 0; $i < count($out[1]); $i++)
  {
    $temp[] = trim($out[2][$i]);
  }

  // ���������, ������� �� ����� ������� ��������
  if(isset($_GET['page'])) $page = $_GET['page'];
  else $page = 1;
  // ���������� �������
  $total = count($temp);
  $number = (int)($total/$pnumber);
  if((float)($total/$pnumber) - $number != 0) $number++;

  $start = (($page - 1)*$pnumber + 1);
  $end = $page*$pnumber + 1;
  if($end > $total) $end = $total;

  // ������� ���������� �������
  for($i = $start; $i < $end; $i++)
  {
    echo $temp[$i]."<br>";
  }

  // ������������ ���������
  for($i = 1; $i <= $number; $i++)
  {
    // ���� ��� ������������ ��������, ������� ������ � ����
    // ��������� �� ������� ������� �� ������� ���� $pnumber
    if($i != $number)
    {
      if($page == $i)
      {
        echo "[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;";
      }
      else
      {
        echo "<a href=$_SERVER[PHP_SELF]?page=".$i.">[".
             (($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</a>&nbsp;";
      }
    }
    // ���� ��� ��������� ��������, �������� ��������� ����� 
    // ������������ ����������� ������� � ������� $temp
    else
    {
      if($page == $i)
      {
        echo "[".(($i - 1)*$pnumber + 1)."-".($total - 1)."]&nbsp;";
      }
      else
      {
        echo "<a href=$_SERVER[PHP_SELF]?page=".$i.">[".
             (($i - 1)*$pnumber + 1)."-".($total - 1)."]</a>&nbsp;";
      }
    }
  }
?>
