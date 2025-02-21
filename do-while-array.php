<?php
$a = array("a", "b", "c");
$b = array("a", "b");
$c = array("a", "b", "c", "d");
$d = array("a", "b", "c", "d", "e");

$maxl2 = max(count($a), count($b), count($c), count($d)); 

/* idhsidjhdi */

$t = [];
$y = [];
$z = [];
$x = [];


$i = 0; // Initialize the loop counter

do {
if (isset($a[$i])) {
$t[] = $a[$i];
}

if (isset($b[$i])) {
$y[] = $b[$i];
}

if (isset($c[$i])) {
$z[] = $c[$i];
}

if (isset($d[$i])) {
$x[] = $d[$i];
}

echo "
<pre>";
    print_r($t);
    print_r($y);
    print_r($z);
    print_r($x);

    $i++; // Increment the loop counter
} while ($i < $maxl2); // Loop condition

echo "<pre>";
