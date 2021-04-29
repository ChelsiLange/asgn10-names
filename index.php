<?php

include 'utility-functions/functions.php';
include 'utility-functions/name-functions.php';

$fileName = 'names.txt';

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

$firstNames = firstNames($fullNames);
$lastNames = lastNames($fullNames);
$validFullNames = validFullNames($fullNames, $firstNames, $lastNames);



// Display results

echo "<h1>Names Results</h1>";

echo "<h2>All Names</h2>";
echo "<p>There are ". sizeof($fullNames) ." total names</p>";
//echo "<ul>";
//  foreach($fullNames as $fullName) {
//    echo "<li>$fullName</li>";
//  }
//echo "</ul>";

echo "<h2>Valid Names</h2>";
echo "<p>There are ". sizeof($validFullNames) ." total valid names</p>";
//echo "<ul>";
//  foreach($validFullNames as $validFullName) {
//    echo "<li>$validFullName</li>";
//  }
//echo "</ul>";

echo "<h2>Unique Names</h2>";
$uniqueNames = (array_unique($validFullNames));
echo "<p>There are ". sizeof($uniqueNames) ." total unique names</p>";
//echo "<ul>";
//  foreach($uniqueNames as $uniqueName) {
//    echo "<li>$uniqueName</li>";
//  }
//echo "</ul>";

echo "<h2>Unique First Names</h2>";
$uniqueFirstNames = (array_unique($firstNames));
echo "<p>There are ". sizeof($uniqueFirstNames) ." total unique first names</p>";

echo "<h2>Unique Last Names</h2>";
$uniqueLastNames = (array_unique($lastNames));
echo "<p>There are ". sizeof($uniqueLastNames) ." total unique last names</p>";

//This is as far as I could figure it out.

?>