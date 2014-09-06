<?php
session_start();
$_SESSION["timeTaken"][$_SESSION["currTrial"]] = $_POST["timeDiff"];
$parsedStimuli = preg_replace("(<br>)", "", $_POST["stimuli"]);
$parsedStimuli = preg_replace('/[^a-z]+/i', '', $parsedStimuli);
//$parsedStimuli = strtolower($parsedStimuli);
$input = preg_replace('/[^a-z]+/i', '', $_POST["input"]);
//$input = strtolower($parsedStimuli);
if(strcasecmp($input,$parsedStimuli) == 0) {
	$_SESSION["expTrial"][$_SESSION["currTrial"]++] = 1;
	}
else {
	$_SESSION["expTrial"][$_SESSION["currTrial"]++] = 0;
}
?>