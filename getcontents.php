<!DOCTYPE html>
<html>
<style>
@font-face { font-family: "Overwatch"; src: url("big_noodle_titling_oblique.ttf") }
.ow {
	font-family: Overwatch;
	color: white;
	font-size: 48px;
	text-shadow:
   -4px 4px 0 #000,
   -2px -2px 0 #000,  
    2px -2px 0 #000,
    -2px 2px 0 #000,
     2px 2px 0 #000;
}
</style>
<body>

<?php 
if ($_REQUEST["bnet"]){
	$user1 = $_REQUEST["bnet"];
	$encod = utf8_encode($user1);
	$user =  rawurlencode($encod);
	$clean = str_replace('%83%C2', '', $user);
}
elseif (!$user){
	$user1 = $argv[1];
	$encod = utf8_encode($user1);
	$user =  rawurlencode($encod);
	$clean = str_replace('%83%C2', '', $user);
}
$url = "https://playoverwatch.com/en-us/career/pc/us/$clean";
$contents = file_get_contents($url);
preg_match('/(http)\S+rank\S+(g)/' , $contents, $rankArray, PREG_OFFSET_CAPTURE);
$rank = $rankArray[0][0]; 

preg_match('/(http)\S+Border\S+(g)/' , $contents, $borderArray, PREG_OFFSET_CAPTURE);
$border = $borderArray[0][0];

preg_match('/(http)\S+Rank\S+(g)/' , $contents, $starsrArray, PREG_OFFSET_CAPTURE);
$stars = $starsrArray[0][0];

preg_match('/(http)\S+unlocks\S+(g)/' , $contents, $avatarArray, PREG_OFFSET_CAPTURE);
$avatar = $avatarArray[0][0];

preg_match('/(https)\S+(portrait)\S+(g)/', $contents, $heroArray, PREG_OFFSET_CAPTURE);
$hero = $heroArray[0][0];

preg_match('/u-vertical-center">\S+(<)/', $contents, $levelArray, PREG_OFFSET_CAPTURE);
$levelString = $levelArray[0][0];
$levelRaw = filter_var($levelString, FILTER_SANITIZE_NUMBER_INT);
$level = str_replace('--', '', $levelRaw);

preg_match('/u-align-center h6">\S+</', $contents, $srArray, PREG_OFFSET_CAPTURE);
$srString = $srArray[0][0];
$srRaw = filter_var($srString, FILTER_SANITIZE_NUMBER_INT);
$sr = str_replace('--6', '', $srRaw);


$workingname = $_REQUEST["bnet"];
$name = str_replace('-', '#', $workingname);
?>
<img src="<?php echo $rank; ?>" height="5%" width="5%">

<img src="<?php echo $border; ?>" height="7%" width="7%">

<img src="<?php echo $stars; ?>" height="7%" width="7%">

<img src="<?php echo $avatar; ?>" height="3%" width="3%">

<img src="<?php echo $hero; ?>" height="25%" width="25%">
<br>
<font class = "ow"> <?php echo $name; ?> </font><br>
<font class = "ow"> <?php echo $level; ?> </font><br>
<font class = "ow"> <?php echo $sr; ?> </font>
<?php echo "<br><br> Name = $name and you are Level $level and your SR is $sr <br><br>"; 
//echo "\n"; $new = str_replace('%83%C2', '', $user); echo "new is " . $new; echo "\n"; echo "<br>"; echo $user; echo "<br>"; echo $clean; echo "<br>"; echo "URL is : https://playoverwatch.com/en-us/career/pc/us/$new"; echo "<br>" . str_replace('%83%C2', '', $url); 
//$newurl =  str_replace('%83%C2', '', $url);
//$contents2 = file_get_contents($newurl);

//var_dump($contents2);

?>


</body>
</html>
