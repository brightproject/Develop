<?php
  // ������������� �������������� ����� ���������� �������
  set_time_limit(0);

  // ������ ������ �� ����� password
  $pass = file("password");
  foreach($pass as $password)
  {
    // �������� �����, ����������� �� ������ ������
    $begin = time();
    echo decrypt_md5(trim($password));
    $end = time();
    echo "  (�� ������ ��������� ".($end - $begin)." ������) <br>";
  }

  // ������� ������������� �������� ������
  // $pass - ���������������� ������
  // $answer - ������� �����, ��� ������ ������ - ������ ������
  function decrypt_md5($pass)
  {
    // ��������� ���������� ������� � ������
    $dict = file("linux.words");
    // � ����� ��������� ������
    foreach($dict as $word)
    {
      if(md5(trim(strtolower($word))) == $pass) return strtolower($word);
    }
  }
?>
