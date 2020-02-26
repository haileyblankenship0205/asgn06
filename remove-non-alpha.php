<?php 

//Class demo thing

$string = "123Becker, Arvid -- dolores ut";

$string = preg_replace("/[^A-Za-z]/", '', $string);

echo $string;