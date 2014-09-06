<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjmonsi
 * Date: 10/7/13
 * Time: 3:59 PM
 * To change this template use File | Settings | File Templates.
 */
include ("./header.php");
session_start();

if (!isset ($_SESSION["interface"])) {
    if (!empty($_SESSION)) {
        $interface = $_SESSION['interface'];
        setcookie("interface", $interface, time()+(3600*3));
        //echo "hello";
    } else {
        header("Location: index.php");        
        exit;
    }
} else {
    $interface = $_SESSION["interface"];
    if (strcmp($interface, "acp")==0) {
        $interface = "xwindow";
    } else {
        $interface = "acp";
    }
}
$user = $_SESSION["user"];
require_once("external_files.php");

if (isset($_COOKIE["block"]) && isset($_COOKIE["max_blocks"])) {
    $block_num = floatval($_COOKIE["block"]);
    $block_num = $block_num+1;
    $modular_num = intval($block_num);
    $block_num = $block_num/2;
    $block_num = round($block_num, 0, PHP_ROUND_HALF_UP);

    $tasklist = $tasklist."_".$user."_".$block_num;

    if (($modular_num%2)==1) {
        if (isset ($_SESSION["interface"])) {
            $interface = $_SESSION["interface"];
            if (strcmp($interface, "acp")==0) {
                $interface = "acp";
            } else {
                $interface = "xwindow";
            }
        }
    }
//    echo $_COOKIE["block"]."\n";
//    echo $_COOKIE["max_blocks"]."\n";
//    echo intval($_COOKIE["max_blocks"])."\n";
//    echo (intval($_COOKIE["max_blocks"])*2)." ";
//    echo $block_num;
}
$timer_message = "Once you're ready, click start!" . "<br>";
if($_SESSION["currTrial"] > 35 && $_SESSION["currTrial"]%36 == 0){
	echo '<style type="text/css">
        #timerMsg {
            font-size: 20px;
			font-style: bold;
			color: red;
        }
        </style>';
	$timer_message = "Please take a minute to rest before you start again." . "<br>";
}
if (strcmp($interface, "acp")==0) {
    $msg = "Here are the instructions when using AutoComPaste Interface!" . "\r\n".
	"<br><br>1. Click on the TextEditor Window inside the system. 
	<br>2. Type the first few letters of the required sentences. A drop down menu will give you suggestions of the required sentence.
	<br>3. Pressing the DOWN/UP arrow keys scrolls through the sentences in the suggestions menu. 
	<br>4. Pressing ENTER will select and paste the sentence.
	<br>5. Pressing LEFT/RIGHT arrow keys after pressing ENTER will delete/add to the pasted sentence.
	<br>6. Pressing DOWN/UP after pressing ENTER will delete/add paragraphs to the sentence.
	<br><br>";
    $acpflag = "true";
} else {
    $msg = "Here are the instructions when using XWindows Interface!" . "\r\n".
	"<br><br>1. See the sentence that you have to copy. 
	<br>2. Find the sentence in on of the open windows.
	<br>3. Highlight the sentence you need and hold down CTRL+C to copy the sentence. 
	<br>4. Select the text window and hold CTRL+V to paste the sentence.
	<br><br>";
    $acpflag = "false";
}

?>
<html>
<head>
    <title>AutoComPaste experiment</title>
</head>
<body>
<div class = "spacer"></div>
<div class = "header"> Experiment phase </div>
<div class = "spacer"></div>
<div class = "container">
	<div id = "timer"> </div>
	Next, you will have to copy and paste a series of text passages.
	<?php echo $msg; ?>
    <span class = "" id ="timerMsg">
       <?php echo $timer_message;?><br>
    </span>
    <form id = "next" action="interface1.php?user=<?php echo $user; ?>&acp=<?php echo $acpflag; ?>&data=<?php echo $data; ?>&jslist=<?php echo $jslist; ?>&tasklist=<?php echo $tasklist; ?>" method="post">
        <input id="submit" type="submit" value="Start">
    </form>
</div>
	<div class = "spacer"></div>
	<div class = "spacer"></div>
	<div class = "footer"> This is an experiment conducted by Christopher Andy Weidya for CS4249(Phenomena and Theories of HCI) AY14/15 under Zhao Shendong.</div>
</body>
</html>
