<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/18/13
 * Time: 6:03 PM
 * To change this template use File | Settings | File Templates.
 */
session_start();
$filename = $_SESSION["user"] . ".xls";
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$score = 0;
foreach($_SESSION["expTrial"] as $s){
	$score += $s;
}
$score = $score/108.0;
echo "User" . "\t" . "Gender" . "\t" . "age" . "\t". "occupation" . "\t" . 
	"compUsage" . "\t" . "copyexp" . "\t" . "remarks" . "\t" . "Score" . "\t" ;
foreach($_SESSION["timeTaken"] as $i => $t) {
	echo "Trial: " . $i . "\t" ;
}
echo "\n";
echo $_COOKIE["user"] . "\t" . $_SESSION["gender"] . "\t" . $_SESSION["age"] . "\t". $_SESSION["occupation"] . "\t" . 
	$_SESSION["compUsage"] . "\t" . $_SESSION["copyexp"] . "\t" . $_SESSION["remarks"] . "\t" . $score . "\t" ;
foreach($_SESSION["timeTaken"] as $t) {
	echo $t . "\t" ;
}
echo "\n";
//var_dump($_COOKIE);
//var_dump($_SESSION);
?>
