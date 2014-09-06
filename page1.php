<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 1:02 PM
 * To change this template use File | Settings | File Templates.
 */
include ("./header.php");
session_start();
$gender = $age = $occupation = $compUsage = $copyexp = $remarks = "";
$genderErr = $ageErr = $occupationErr = $compUsageErr = $copyexpErr = "";
$done = true;
$errorMessage = "*Missing";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_SESSION["remarks"] = $_POST["remarks"];
	if (empty($_POST["gender"])) {
		$genderErr = $errorMessage;
		$done = false;
	} else {				
		$gender = test_input($_POST["gender"]);		
		$_SESSION['gender'] = $gender;
	}
	if (empty($_POST["age"])) {
		$ageErr = $errorMessage;
		$done = false;
	} else {				
		$age = test_input($_POST["age"]);		
		$_SESSION['age'] = $age;
	}
	if (empty($_POST["occupation"])) {
		$occupationErr = $errorMessage;
		$done = false;
	} else {				
		$occupation = test_input($_POST["occupation"]);		
		$_SESSION['occupation'] = $occupation;
	}
	if (empty($_POST["compUsage"])) {
		$compUsageErr = $errorMessage;
		$done = false;
	} else {				
		$compUsage = test_input($_POST["compUsage"]);		
		$_SESSION['compUsage'] = $compUsage;
	}
	if (empty($_POST["copyexp"])) {
		$copyexpErr = $errorMessage;
		$done = false;
	} else {				
		$copyexp = test_input($_POST["copyexp"]);		
		$_SESSION['copyexp'] = $copyexp;
	}
	if($done) {
		header('location: page2.php');
		die();
	}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// save $user as cookie as a carry on data for the next pages
setcookie("user", $_SESSION['user'], time()+(3600*3)); // time of expiration is 3 hours
?>
<html>
<head>
    <title>Experiment Run Template 1</title>
</head>
<body>
	<div class = "spacer"></div>
	<div class = "header"> Tell us a little bit about yourself! </div>
	<div class = "spacer"></div>
	<div class = "container">
	<div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form">
		What is your gender?
        <input type="radio" name="gender" value="M">Male
        <input type="radio" name="gender" value="F">Female
		<span class="error"><?php echo $genderErr;?></span><br><br>
		What is your age?&nbsp;&nbsp;
		<input type="text" name="age" />
		<span class="error"><?php echo $ageErr;?></span><br><br>
        What is your occupation?&nbsp;&nbsp;
		<input type="text" name="occupation" />
		<span class="error"><?php echo $occupationErr;?></span><br><br>
		On a daily average, how much time do you spend using the computer?
		<span class="error"><?php echo $compUsageErr;?></span><br>
        <input type="radio" name="compUsage" value="low">Less than 1 hour <br>
        <input type="radio" name="compUsage" value="moderate">Between 1 to 4 hours<br>
        <input type="radio" name="compUsage" value="moderate">More than 4 hours<br><br>
		Are you familiar with the copy and paste interface in Windows?<br>
        <input type="radio" name="copyexp" value="Y">Yes
        <input type="radio" name="copyexp" value="N">No
		<span class="error"><?php echo $copyexpErr;?></span><br><br>
		<!--
        <span>Information 4</span><br/>
        <select name="var4">
            <option value="1a">Option A</option>
            <option value="2b">Option B</option>
            <option value="3c">Option C</option>
            <option value="4d">Option D</option>
        </select><br/> -->
        <span>Any remarks?</span> <br>
        <textarea name="remarks" rows="2" cols="40">
        </textarea><br/> <br>
        <input id="submit" type="submit" value="Submit">
    </form>
</div>
</div>
	<div class = "spacer"></div>
	<div class = "footer"> This is an experiment conducted by Christopher Andy Weidya for CS4249(Phenomena and Theories of HCI) AY14/15 under Zhao Shendong.</div>
</body>
</html>