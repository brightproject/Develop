<form method=get> 
������� �����:
<input type=text name=number value=<?= $_GET['number'] ?>><br>
<input type=submit value="�������������"> 
</form>
<?php
  if(!empty($_GET))
  {

  // �������� �����
  $number = $_GET['number'];
  // ������ ��� �������� �����
  $roman = "";

  if($number > 2000 || $number < 1)
  {
    exit("����� ������ ��������� �������� �� 1 �� 2000");
  }

  // ���������� ����������� 1, 10, 100 � 1000
  $one = array('I','X','C','M');
  // ���������� ����������� 5, 50 � 500
  $five = array('V','L','D');

  // ������������� ������ ��� �������� $one[] � $five[]
  $index = 0;
  do
  {
    switch($number % 10)
    {
      case 1:
        $roman = $one[$index].$roman;
        break;
      case 2:
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        break;
      case 3:
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        break;
      case 4:
        $roman = $five[$index].$roman;
        $roman = $one[$index].$roman;
        break;
      case 5:
        $roman = $five[$index].$roman;
        break;
      case 6:
        $roman = $one[$index].$roman;
        $roman = $five[$index].$roman;
        break;
      case 7:
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        $roman = $five[$index].$roman;
        break;
      case 8:
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        $roman = $five[$index].$roman;
        break;
      case 9:
        $roman = $one[$index + 1].$roman; // ������ I -> X
        $roman = $one[$index].$roman;
        break;
    }
    $number = $number / 10;
    $index++;
  }
  while($number);

  // ������� ���������
  echo $roman;
  }
?>
