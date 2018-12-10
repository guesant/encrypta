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

  // Encrypta work
  protected function encryptaEngine($str, $rot, $kutter){
    // Functional var's
    $initialString = base64_encode($str); // Support non-latim symbols. Like chinese, arabic language.
    $finalString = ""; // Encrypta string

    // str to array
    $splitInitial = str_split($initialString);
    
    // Caesar chipher function
    foreach ($splitInitial as $key => $value) {
      $position = strpos($kutter, $value);
      $newChar = $kutter[($position + $rot) % strlen($kutter)];

      $finalString .= $newChar;
    }
    return $finalString;
  }

  // Decrypta work
  protected function decryptaEngine($str, $rot, $kutter){
    // Functional var's
    $initialString = $str;
    $finalString = "";    

    // str to array
    $splitInitial = str_split($initialString);

    // Inverted Caesar Chipher
    foreach ($splitInitial as $key => $value) {
      $position = strpos($kutter, $value);
      $newChar = $kutter[($position - $rot) % strlen($kutter)];

      $finalString .= $newChar;
    }
    $finalString = base64_decode($finalString);
    return $finalString;
  }
}

?>