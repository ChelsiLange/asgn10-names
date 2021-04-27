<?php

include 'utility-functions/functions.php';

$fileName = 'names-short-list.txt';

$lineNumber = 0;

$names = fopen("$fileName", "r");
$nextName = fgets($names);

while(!feof($names)) {
  if($lineNumber % 2 == 0) {
    $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
  }
  $lineNumber++;
  $nextName = fgets($names);
}

// First names into array
foreach($fullNames as $fullName) {
  $startHere = strpos($fullName, ",") + 1;
  $firstNames[] = trim(substr($fullName, $startHere));
}

// Last names into array
foreach($fullNames as $fullName) {
  $stopHere = strpos($fullName, ",");
  $lastNames[] = substr($fullName, 0, $stopHere);
}

// Validate names
for($i = 0; $i < sizeof($fullNames); $i++) {
  if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
    $validFirstNames[$i] = $firstNames[$i];
    $validLastNames[$i] = $lastNames[$i];
    $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
  }
}



// Test
echo "<h1>Names</h1>";
for ($i = 0; $i < sizeof($validFullNames); $i++) {
  echo $validFullNames[$i] ."<br>";
}

?>