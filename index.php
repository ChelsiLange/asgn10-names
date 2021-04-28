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




// Display results

echo "<h1>Names Results</h1>";

echo "<h2>All Names</h2>";
echo "<p>There are ". sizeof($fullNames) ." total names</p>";
echo "<ul>";
  foreach($fullNames as $fullName) {
    echo "<li>$fullName</li>";
  }
echo "</ul>";

echo "<h2>Valid Names</h2>";
echo "<p>There are ". sizeof($validFullNames) ." total valid names</p>";
echo "<ul>";
  foreach($validFullNames as $validFullName) {
    echo "<li>$validFullName</li>";
  }
echo "</ul>";

echo "<h2>Unique Names</h2>";
$uniqueNames = (array_unique($validFullNames));
echo "<p>There are ". sizeof($uniqueNames) ." total unique names</p>";
echo "<ul>";
  foreach($uniqueNames as $uniqueName) {
    echo "<li>$uniqueName</li>";
  }
echo "</ul>";





?>