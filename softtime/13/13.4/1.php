<?php
  class cls
  {
    public $var;
    public function __construct()
    {
      $this->var = 100;
    }
  }

  $obj = new cls();
  $new_obj = $obj;
  $new_obj->var = 200;
  echo $obj->var; // 200
?>
