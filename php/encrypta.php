<?php
class Encrypta{
  private $kutter;

  function __construct($theKutter = ""){
    $this->setKutter($theKutter);
  }

  // Set the kutter
  public function setKutter($kutter = ""){
    $kutter = filter_var($kutter, FILTER_SANITIZE_STRING);
    
    if(strlen($kutter) < 65){
      $kutter = "cfEbULjpTQ9ASZFhd7lHqtz24XWueIG3wVvRmak/o+riMKsC0BNPY=D6Jxy815nOg";
    }
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
  
  // BUGFIX. The PHP don't have a real module operation.
  private function realMod($a, $b){
    $mod = $a % $b;
    if ($mod < 0)
    {
      $mod += abs($b);
    }
    return $mod;
  }

  // Encrypta work
  private function encryptaEngine($str, $rot, $kutter){
    // Functional var's
    $initialString = base64_encode($str); // Support non-latim symbols. Like chinese, arabic language.
    $finalString = ""; // Encrypta string

    // str to array
    $splitInitial = str_split($initialString);
    
    // Caesar chipher function
    foreach ($splitInitial as $key => $value) {
      $position = strpos($kutter, $value);

      // BUGFIX
      $mod = $this->realMod(($position + $rot), strlen($kutter));

      $newChar = $kutter[$mod];

      $finalString .= $newChar;
    }
    return $finalString;
  }
  // Decrypta work
  private function decryptaEngine($str, $rot, $kutter){
    // Functional var's
    $initialString = $str;
    $finalString = "";    

    // str to array
    $splitInitial = str_split($initialString);

    // Inverted Caesar Chipher
    foreach ($splitInitial as $key => $value) {
      $position = strpos($kutter, $value);

      // BUGFIX
      $mod = $this->realMod(($position + $rot), strlen($kutter));

      $newChar = $kutter[$mod];

      $finalString .= $newChar;
    }
    
    $finalString = base64_decode($finalString);
    return $finalString;
  }

  // Encrypta to Final-User
  public function encrypta($str = "", $rot = 7, $stps = 2){
    if($stps < 1){
      return $str;
    }

    $kutter = $this->kutter;
    
    // Set Current step 
    $curStep = 0;

    // Starter Surrent Step
    $enc = $this->encryptaEngine($str, $rot, $kutter);
    $curStep += 1;

    // more 'n more
    while ($curStep < $stps) {
      $kutter = strrev($kutter);
      $enc = strrev($enc);

      $enc = $this->encryptaEngine($enc, $rot, $kutter);

      $curStep += 1;
    }   


    return $enc;
  }  

  // Decrypta to Final-User
  public function decrypta($str = "", $rot = 7, $stps = 2){
    if($stps < 1){
      return $str;
    }

    $kutter = $this->kutter;

    if($stps % 2 == 0){
      $kutter = strrev($kutter);
    }

    $coiso = $str;
    // Set Current step 
    $curStep = $stps;

    // more 'n more
    while ($curStep > 1) {
      $coiso = $this->decryptaEngine($coiso, $rot, $kutter);
      
      
      $kutter = strrev($kutter);
      $coiso = strrev($coiso);

      $curStep -= 1;
    }
    
    
    $coiso = $this->decryptaEngine($coiso, $rot, $kutter); 
    $curStep -= 1;

    return $coiso;
     
  }
}

?>