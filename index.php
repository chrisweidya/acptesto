<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 11:32 AM
 * To change this template use File | Settings | File Templates.
 */
include ("./header.php");
session_start();
$validUsers = ["a_01"=>"1", "a_02"=>"1", "a_03"=>"1", "a_04"=>"1", "a_05"=>"1", "a_06"=>"1", 
	"x_01"=>"1", "x_02"=>"1", "x_03"=>"1", "x_04"=>"1", "x_05"=>"1", "x_06"=>"1"];
$user = "";
$userErr = "";
$done = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["user"])) {
		$userErr = "*Please tell us your user";
		$done = false;
	} else if(!array_key_exists($_POST["user"], $validUsers)) {
		$userErr = "*INVALID USER";
		$done = false;
	} else	{					
		$user = test_input($_POST["user"]);		
		$_SESSION['user'] = $user;
	}
	if($done) {
		header('location: page1.php');
		die();
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>
<head>
</head>
<body>
	<div class = "spacer"></div>
    <div class = "splashTitle">AutoComPaste</div>
	<div class = "spacer"></div>
	<div class = "container" id = "splashContainer">
	<div class = "instructions"> In this experiment, you will be using the current copy and paste technique as well as AutoComPaste
	to retrieve the required sentences. <br><br>To begin this experiment, please enter your Participant ID. </div>
	<div class = "spacer"></div>
    <div class = "inputform">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Participant ID:
			<input type="text" value ="Sample ID: <a_01> "name="user">			
            <input id="submit" type="submit" value="Start">
			<span class="error"><?php echo $userErr;?></span>
        </form>
	</div></div>
	<div class = "spacer"></div>
	<div class = "spacer"></div>
	<div class = "footer"> This is an experiment conducted by Christopher Andy Weidya for CS4249(Phenomena and Theories of HCI) AY14/15 under Zhao Shendong.</div>
    </div>

</body>
</html>