<?php
class Encrypta{
  private $kutter;

  function __construc($theKutter = ""){
    $this->setKutter($theKutter);
  }
  // Set kutter function
  public function setKutter($kutter = ""){
    $this->kutter = $kutter;    
  }
}

?>