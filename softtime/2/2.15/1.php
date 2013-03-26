<?php
function shighlight($document)
{
  // ����������� ������� ������ ��� ����������� HTML-�����
  $document = str_replace("<", "&lt;", $document);
  $document = str_replace(">", "&gt;", $document);
  // ����������� ���� PHP <?php � ? >
  $tegs = array("'&lt;\?php'si","'&lt;\?'si","'\?&gt;'si");
  $replace = array("<font color=#95001E>&lt;?php</font>",
                   "<font color=#95001E>&lt;?</font>",
                   "<font color=#95001E>?&gt;</font>");
  $document = preg_replace($tegs, $replace, $document);
  // ����������� �����������
  $document = preg_replace("'((?:#|//)[^\n]*|/\*.*?\*/)'si",
                           "<font color=#244ECC>\\1</font>",
                            $document);
  // ������������ �������� �����
  $document = preg_replace("'(\n)'si","<br>\\1", $document);
  // ����������� �������
  $document = preg_replace ("'([\w]+)([\s]*)[\(]'si",
                            "<font color=#0000CC><b>\\1</b></font>\\2(",
                            $document);
  // ����������� ���������
  $separator = array("'\,'si",
                     "'\-'si",
                     "'\+'si",
                     "'\('si",
                     "'\)'si",
                     "'\{'si",
                     "'\}'si");
  $replace = array("<font color=#1A691A>,</font>",
                   "<font color=#1A691A>-</font>",
                   "<font color=#1A691A>+</font>",
                   "<font color=#1A691A>(</font>",
                   "<font color=#1A691A>)</font>",
                   "<font color=#1A691A>{</font>",
                   "<font color=#1A691A>}</font>");
  $document = preg_replace($separator,$replace,$document);
  // ����������� ���������� PHP
  $document = preg_replace("'([\$]{1,2}[A-Za-z_]+)'si",
                           "<b><font color=#000000>\\1</font></b>",
                           $document);
  // ����������� ������, ����������� � ��������� � ������� �������
  $str = array("'(\"[^\"]*\")'si",
                 "'(\'[^\']*\')'si");
  $replace = array("<font color=#FFCC00>\\1</font>",
                   "<font color=#FFCC00>\\1</font>");
  $document = preg_replace($str, $replace, $document);
  // ����������� ����������������� �����
  $str = array("'(echo)'si",
               "'(print)'si",
               "'(while)'si",
               "'(for)'si",
               "'(if)'si",
               "'(else)'si",
               "'(switch)'si",
               "'(function)'si",
               "'(array)'si");
  $replace = array_fill(0,
                        count($str),
                        "<b><font color=#0000CC>\\1</font></b>");
  $document = preg_replace($str, $replace, $document);

  // ���������� ��������� ������ �������
  return "<code>$document</code>";
}
?>
