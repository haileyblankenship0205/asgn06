<?php

function loop_dump($ary) {
    echo '<ul style="list-style-type:none">';
    foreach($ary as $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
}