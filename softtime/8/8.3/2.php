<?php
  // ������������� �������������� ����� ���������� �������
  set_time_limit(0);

  // ������ ������ �� ����� password
  $temp = file("password");
  // �������� �����, ����������� �� ������ ������
  $begin = time();
  $i = 0;
  foreach($temp as $password)
  {
    $pass['pass'][$i] = trim($password);
    $pass['answer'][$i] = "";
    $i++;
  }
  decrypt_md5("");
  $end = time();
  echo "�� ������ ��������� ".($end - $begin)." ������<br>";
  foreach($pass['answer'] as $password)
  {
    echo $password."<br>";
  }

  // ������� ������������� �������� ������
  // $pass - ���������������� ������
  // $answer - ������� �����, ��� ������ ������ - ������ ������
  function decrypt_md5($answer)
  {
    global $pass;
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','q','r','s',
                 't','u','v','w','x','y','z');
    // ����� �������, ��� ������ �� ���������
    // 4 ��������
    $max_number = 3;
    if(strlen($answer) > $max_number) return;
    // ���� ��� ������ ���������� - �������
    // �� ������������ ������
    $ret = true;
    for($i = 0; $i < count($pass['pass']); $i++)
    {
      if(empty($pass['answer'][$i]))
      {
        $ret = false;
        break;
      }
    }
    if($ret) return;

    for($j = 0; $j < count($arr); $j++)
    {
      $temp = $answer.$arr[$j];
      // ���������, �� ������ �� �����-������ ������
      for($i = 0; $i < count($pass['pass']); $i++)
      {
        if(md5($temp) == $pass['pass'][$i])
        {
          $pass['answer'][$i] = $temp;
        }
      }
      // ���������� �������� ������� ��� ����������
      // ����� ������������ ������
      decrypt_md5($temp);
    }
  }
?>
