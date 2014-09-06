<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 3:45 PM
 * To change this template use File | Settings | File Templates.
 */
include ("./header.php");
// Process your information here
session_start();
/**
if (!empty($_POST)) {
    $demodata = $_POST;
    foreach ($_POST as $key => $value) {
        setcookie("demodata_".$key, $value, time()+(3600*3));
    }
}*/
$user = $_SESSION['user'];
$_SESSION['startTime'] = null;
// SET FOR BLOCKS HERE!!!
$max_blocks = 3;
$_SESSION['timeTaken'] = array();
$_SESSION['expTrial'] = array();
$_SESSION['currTrial'] = 0;
setcookie("max_blocks", strval($max_blocks), time()+(3600*3));
setcookie("block", strval(0), time()+(3600*3));

$expType = substr($user, 0, 1);
if($expType == "X" || $expType =="x") {
	$_SESSION['interface'] = $interface = "xwindow";
	header('location: page3.php');
	}
else {
	$_SESSION['interface'] = $interface = "acp";
	header('location: page3.php');
}

?>

<html>
<head>
    <title>Experiment Run Template 1</title>
</head>
<body>
<div>
    <p>
This part of the interface makes you choose which Interface do you want to do first. You can also modify this to make it automatic (i.e. depending on the id number, they would do ACP first
        then XWindow second, or vice-versa...
    </p>
</div>
<div>
    <p>What should <?php echo $user; ?> do first?</p>
<form action="page3.php" method="post">
    <span>Interface</span><br/>
    <input type="radio" name="interface" value="acp">ACP<br/>
    <input type="radio" name="interface" value="xwindow">XWindow<br/>
    <input id="submit" type="submit" value="submit">
</form>
</div>

</body>
</html>