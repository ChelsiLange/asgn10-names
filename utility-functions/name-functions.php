<?php

function firstNames($fullNames) {
  foreach($fullNames as $fullName) {
    $startHere = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startHere));
  }
  return $firstNames;
}

function lastNames($fullNames) {
  foreach($fullNames as $fullName) {
    $stopHere = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $stopHere);
  }
  return $lastNames;  
}

function validFullNames($fullNames, $firstNames, $lastNames) {
  for($i = 0; $i < sizeof($fullNames); $i++) {
    if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
      $validFirstNames[$i] = $firstNames[$i];
      $validLastNames[$i] = $lastNames[$i];
      $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
  }
  return $validFullNames; 
}


?>