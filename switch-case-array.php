<?php
$a = array("a", "b", "c");
$b = array("a", "b");
$c = array("a", "b", "c", "d");
$d = array("a", "b", "c", "d", "e");

$t = [];
$y = [];
$z = [];
$x = [];

$i = 0;
$l = 5;
switch ($l<$i) {
    case ($i == 0):
        if (isset($a[$i])) $t[] = $a[$i];
        if (isset($b[$i])) $y[] = $b[$i];
        if (isset($c[$i])) $z[] = $c[$i];
        if (isset($d[$i])) $x[] = $d[$i];
        echo "<pre>";
        print_r($t);
        print_r($y);
        print_r($z);
        print_r($x);
        echo "</pre>";
        $i++;
        // Fall through

    case ($i == 1):
        if (isset($a[$i])) $t[] = $a[$i];
        if (isset($b[$i])) $y[] = $b[$i];
        if (isset($c[$i])) $z[] = $c[$i];
        if (isset($d[$i])) $x[] = $d[$i];
        echo "<pre>";
        print_r($t);
        print_r($y);
        print_r($z);
        print_r($x);
        echo "</pre>";
        $i++;
        // Fall through

    case ($i == 2):
        if (isset($a[$i])) $t[] = $a[$i];
        if (isset($b[$i])) $y[] = $b[$i];
        if (isset($c[$i])) $z[] = $c[$i];
        if (isset($d[$i])) $x[] = $d[$i];
        echo "<pre>";
        print_r($t);
        print_r($y);
        print_r($z);
        print_r($x);
        echo "</pre>";
        $i++;
        // Fall through

    case ($i == 3):
        if (isset($a[$i])) $t[] = $a[$i];
        if (isset($b[$i])) $y[] = $b[$i];
        if (isset($c[$i])) $z[] = $c[$i];
        if (isset($d[$i])) $x[] = $d[$i];
        echo "<pre>";
        print_r($t);
        print_r($y);
        print_r($z);
        print_r($x);
        echo "</pre>";
        $i++;
        // Fall through

    case ($i == 4):
        if (isset($a[$i])) $t[] = $a[$i];
        if (isset($b[$i])) $y[] = $b[$i];
        if (isset($c[$i])) $z[] = $c[$i];
        if (isset($d[$i])) $x[] = $d[$i];
        echo "<pre>";
        print_r($t);    
        print_r($y);
        print_r($z);
        print_r($x);
        echo "</pre>";
        $i++;
        // Fall through

    case ($i == 5):
        if (isset($a[$i])) $t[] = $a[$i];
        if (isset($b[$i])) $y[] = $b[$i];
        if (isset($c[$i])) $z[] = $c[$i];
        if (isset($d[$i])) $x[] = $d[$i];
        echo "<pre>";
        print_r($t);
        print_r($y);
        print_r($z);
        print_r($x);
        echo "</pre>";


// echo "<pre>";
// print_r($t);
// print_r($y);
// print_r($z);
// print_r($x);
// echo "</pre>";
}
