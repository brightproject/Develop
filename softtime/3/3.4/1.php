<?php
  // ���� �������� ������������ ���������� �����,
  // ��������� ���� � �������������� ���
  if(isset($_POST['content']))
  {
    // ��������� ����
    $fd = @fopen($_POST['filename'], "w");
    // ���� ���� �� ����� ���� ������ - ��������
    // �� ���� ��������������� � ���� ��������
    if(!$fd) exit("����� ���� �����������");
    // �������������� ���������� �����
    fwrite($fd, stripslashes($_POST['content']));
    // ��������� ����
    fclose($fd);
    // �������� � ��������������� ������ $_GET
    // ��� �����
    $_GET['filename'] = $_POST['filename'];
  }
?>
<form name=first method="get">
   ��� ����� <input type="text" name="filename" 
                    value=<?php echo $_GET['filename']; ?>>
  <input type="submit" value="�������">
</form>
<?php
  // ���� � ������ ������� �������� ���
  // ����� - ��������� ��� ��� ��������������
  if(isset($_GET['filename']))
  {
    // ��������� ����
    $fd = @fopen($_GET['filename'], "r");
    // ���� ���� �� ����� ���� ������ - ��������
    // �� ���� ��������������� � ���� ��������
    if(!$fd) exit("����� ���� �����������");
    // �������� ���������� ����� � ���������� $bufer
    $bufer = fread($fd, filesize($_GET['filename']));
    // ��������� ����
    fclose($fd);
    ?>
      <form name=second method="post">
        <textarea cols=50 rows=5 name="content"><?php 
           echo htmlspecialchars($bufer); ?></textarea><br>
        <input type="hidden" name=filename 
               value='<?php echo $_GET['filename']; ?>'>
        <input type="submit" name=edit value="�������������">
      </form>
    <?php
  }
?>
