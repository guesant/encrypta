<?php
class Encrypta{
  private $kutter;

  function __construc($theKutter = ""){
    $this->setKutter($theKutter);
  }

  // Set the kutter
  public function setKutter($kutter = ""){
    $this->kutter = $kutter;    
  }

  // Generate a new Kutter
  public function randKutter(){
    $starterKut = "CZSIechLmkJT1z4y3wiAGg0Q2HdP59Xlu/vVbjYfEtBsMNoF+WK7pa6xDRn=qrU8O";
    
    // Split each char to one array...
    $newKut = str_split($starterKut);  
    // ... and suffle it
    shuffle($newKut);
    
    // With randomized array-kutter, back to string-mode
    $newKut = implode("", $newKut);
    
    // Return new Kutter;
    return $newKut;
  }
}

?>