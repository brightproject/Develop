<?php
  // ������������� �������������� ����� ���������� �������
  set_time_limit(0);

  //������ ������ �� ����� password
  $pass = file("password");
  foreach($pass as $password)
  {
    // �������� �����, ����������� �� ������ ������
    $begin = time();
    echo decrypt_md5(trim($password),"");
    $end = time();
    echo "  (�� ������ ��������� ".($end - $begin)." ������) <br>";
  }

  // ������� ������������� �������� ������
  // $pass - ���������������� ������
  // $answer - ������� �����, ��� ������ ������ - ������ ������
  function decrypt_md5($pass, $answer)
  {
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','q','r','s',
                 't','u','v','w','x','y','z');
    // ����� �������, ��� ������ �� ���������
    // 4 ��������
    $max_number = 3;
    if(strlen($answer) > $max_number) return;

    for($j = 0; $j < count($arr); $j++)
    {
      $temp = $answer.$arr[$j];
      if(md5($temp) == $pass) return $temp;
      // ���������� �������� ������� ��� ����������
      // ����� ������������ ������
      $result = decrypt_md5($pass, $temp);
      // ���� ������� ���������� �������� ������,
      // �������������, ������ ����� � ������ ������
      // �� �������
      if(strlen($result) > 0) return $result;
    }
  }
?>
