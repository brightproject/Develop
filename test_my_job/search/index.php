

    <!--///--- ����� ����� ��������� ����� ---///////////////////////////////
    <form action="search.php" method="POST">
    <input name="keyword" size=18>
    <input type="submit" name="send" value="�����">
    </form>
	-->
	
	    <form action="index.php" method="POST">
    <input name="keyword" size=18>
    <input type="submit" name="send" value="�����">
    </form>
<?php
//--- �������, ������� ��������� ������ �� �������� ����� � ��������� ������ ---////////
    //--- �������������� �������� �������� ������� (or text like), � ������� �� ������ ����������� ����� ---//
	// function keywords_text($words)
		 // {
		        // $keywords = split(' ', $words);
		    // $num_keywords = count($keywords);
		    // for ($i=0; $i<$num_keywords; $i++)
		    // {
		      // if ($i)
		      // {
		        // $keywords_string .= "or text like '%".$keywords[$i]."%' ";
		      // }
		      // else
		      // {
		        // $keywords_string = "text like '%".$keywords[$i]."%' ";
		      // }
		    // }
            // return $keywords_string;
		  // }


	function text($words)
		 {
		        $text = split(' ', $words);
		    $num_keywords = count($text);
		    for ($i=0; $i<$num_keywords; $i++)
		    {
		      if ($i)
		      {
		        $keywords_string .= "or text like '%".$text[$i]."%' ";
		      }
		      else
		      {
		        $keywords_string = "text like '%".$text[$i]."%' ";
		      }
		    }
            return $keywords_string;
		  }	  


  //--- �������� ������ ������� �� �����, ������������ � � ����������� ���� ���������� �������, �������� ������ �������� ���� ---/////
      if(isset($_POST['send']))
  {
    $words = trim($_POST['text']);
    $words = strip_tags($words);
    $words = str_replace("'", "", $words);
    $words = str_replace('"', "", $words);
    $words = str_replace("-", "", $words);
    $words = str_replace(",", "", $words);
	$words=htmlspecialchars(mysql_escape_string($words));


    if (($words) == "")
		{
		echo '�� ������� �������� �����';
		}
          else
        {
			    $var = text($words);
               /*   echo $var. $var2. $var3. $var4. $var5; */
			         if(($var))
            {
             //--- ������ ��� ���������� � ����� ������ ---/////////////////////
            //--- ���� �������������� �� ��������� ����������, �������� �� ��������� ---/////
                    $hostname = "localhost"; //--- ��� ����� (������ localhost)
					$dbusername = "root"; //--- ��� ������������
					$dbpassword = "";   //--- ������ ��� ���������� � �����
					$dbname = "testing";  //--- �������� ���� ������
					$dbcon = @mysql_connect($hostname,$dbusername,$dbpassword);
					  if (!$dbcon) exit("<p>C����� MySQL �� ��������!</p>");
					  if (!@mysql_select_db($dbname,$dbcon)) exit("<p>H� �������� ���� ������</p>");

                    $sql = "SELECT * FROM test_search WHERE ".$var."";
					$result = mysql_query($sql);
					$num_rows = mysql_num_rows($result);
					if ($num_rows <= 0)
				{
				  echo '�� ������ ������� ������ �� �������,<br />���������� �� ������� �������������� �������� �����.';
				}
				   else
			    {
			      echo '�� ������ ������� ������� '.$num_rows.' �����';

                  while(list($id,$text) = mysql_fetch_array($result))

                   echo '<table width="700" height="20" align="center" border="0" cellpadding="3" cellspacing="0">
                            <!--DWLayoutTable-->
                            <tr>
                           <td id="w" width="700" height="20" valign="middle"><a href="'.$title.'.php" title="'.$m_key.'">'.$m_key.'</a></td>
                            </tr></table>';
                }
            }
        }

    }
?>

