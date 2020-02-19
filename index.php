<?php

$lineNumber = 0;
$fullName = [];

$FH = fopen("names-short-file.txt", "r");

$nextName = fgets($FH);

while(!feof($FH)) {
    if($lineNumber % 2 == 0) {
        $endOfNamePostion = strpos($nextName, " --");
        $$nextName = substr($nextName, 0, $endOfNamePostion);
        $fullName[] = $nextName; 

    }

    $lineNumber++;
    $nextName = fgets($FH);
}
print_r($fullName);