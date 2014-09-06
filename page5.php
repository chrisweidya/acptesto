<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 8:20 PM
 * To change this template use File | Settings | File Templates.
 */
include ("./header.php");
session_start();

?>
<html>
<head>
    <title>End of experiment.</title>
</head>
<body>
<div>
	<div class = "spacer"></div>
    <div class = "splashTitle"End of Experiment</div>
	<div class = "spacer"></div>
	<div class = "container" id = "splashContainer">
	<div class = "instructions"> You have reached the end of the experiment. Please do the post-questionnaire which our staff
		will give to you soon.<br><br>Thank you for your participation! </div>
	<div class = "spacer"></div>

    <a href="generate2.php" target="_blank" class = "instructions">Generate Log</a>
</div>
</body>
	<div class = "spacer"></div>
	<div class = "spacer"></div>
	<div class = "footer"> This is an experiment conducted by Christopher Andy Weidya for CS4249(Phenomena and Theories of HCI) AY14/15 under Zhao Shendong.</div>
</html>
