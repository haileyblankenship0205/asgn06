<?php

include_once('functions/utility-functions.php');

$lineNumber = 0;
$fullName = [];

$FH = fopen("names-short-file.txt", "r");

$nextName = fgets($FH);

while(!feof($FH)) {
    if($lineNumber % 2 == 0) {
        $fullName[] = substr($nextName, 0, strpos($nextName, " --"));
        
    }

    $lineNumber++;
    $nextName = fgets($FH);
}

for($i = 0; $i < sizeof($fullName); $i++) {
    if(preg_match("/^([A-Z][a-zA-Z']+), ([A-Z][a-zA-Z']+)/", $fullName[$i] )) {
        $validName[] = $fullName[$i];
    }
}

?>

<h1>Results</h1>

<h2>List of Unique names</h2>

<?php

echo("<p>There are " . sizeof($validName) . " valid array names</p>");

loop_dump($validName);

$uniqueValidNames = (array_unique($validName));

echo"<h2>Unique Valid Names</h2>";

echo("<p>There are " . sizeof($uniqueValidNames) . " unique valid names</p>");

loop_dump($uniqueValidNames);


foreach($uniqueValidNames as $value) {
    $commaPos = strpos($value, ",");
    $uniqueLastName[] = substr($value, 0, $commaPos);
    $uniqueFirstName[] = substr($value, $commaPos + 1);
}
?>

<h2>Unique First Names</h2>

<?php
echo("There are " . sizeof($uniqueFirstName) . " valid first names");
loop_dump($uniqueFirstName);

?>

<h2>Unique Last Names</h2>

<?php
echo("There are " . sizeof($uniqueLastName) . " valid last names");
loop_dump($uniqueLastName);

$values = array_count_values($uniqueLastName);
asort($values);
$popularLast = array_slice(array_keys($values), 0, 10, true);

?>

<h2>Most Common Names</h2>

<?php
echo("Top 10 Most Common Last Names");
loop_dump($popularLast);

$values = array_count_values($uniqueFirstName);
asort($values);
$popularFirst = array_slice(array_keys($values), 0, 10, true);

echo("Top 10 Most Common First Names");
loop_dump($popularFirst);

?>





