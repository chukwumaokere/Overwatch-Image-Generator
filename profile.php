<?php

if ($_REQUEST["bnet"]){
        $user1 = $_REQUEST["bnet"];
        $encod = utf8_encode($user1);
        $user =  rawurlencode($encod);
	$userClean = str_replace('%83%C2', '', $user);
        $clean = str_replace('%83%C2', '', $user);
}
elseif (!$user){
        $user1 = $argv[1];
        $encod = utf8_encode($user1);
        $user =  rawurlencode($encod);
	$userClean = str_replace('%83%C2', '', $user);
        $clean = str_replace('%83%C2', '', $user);
}
//echo $user;
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

//previous code: preg_match('/(https)\S+(portrait)\S+(g)/', $contents, $heroArray, PREG_OFFSET_CAPTURE);
preg_match('/competitive\s{\s+\S+https\S+portrait\S+g/', $contents, $heroArray, PREG_OFFSET_CAPTURE);
$hero = $heroArray[0][0];
$hero = strpbrk($hero, 'h');

preg_match('/u-vertical-center">\S+(<)/', $contents, $levelArray, PREG_OFFSET_CAPTURE);
$levelString = $levelArray[0][0];
$levelRaw = filter_var($levelString, FILTER_SANITIZE_NUMBER_INT);
$level = str_replace('--', '', $levelRaw);

preg_match('/u-align-center h5">\S+</', $contents, $srArray, PREG_OFFSET_CAPTURE);
$srString = $srArray[0][0];
$srRaw = filter_var($srString, FILTER_SANITIZE_NUMBER_INT);
$sr = str_replace('--5', '', $srRaw);

if($sr >= 4200){
	$rank = "https://overwatch.gamepedia.com/media/overwatch.gamepedia.com/thumb/7/73/Badge_8_Top_500.png/120px-Badge_8_Top_500.png";
}

$workingname = $_REQUEST["bnet"];
if (!$_REQUEST["bnet"]){
	$workingname = $clean;
}
$name = str_replace('-', '#', $workingname);


$bg = imagecreatefrompng('gibbg.png');
/*$hero = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/hero/ana/career-portrait.png');
$rank = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/rank-icons/season-2/rank-6.png');
$border = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/playerlevelrewards/0x025000000000094D_Border.png');
$star = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/playerlevelrewards/0x025000000000094D_Rank.png');
$avatar = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/unlocks/0x0250000000001195.png');
*/

$hero1 = imagecreatefrompng("$hero");
//doomfist prank $hero1= imagecreatefrompng("https://blzgdapipro-a.akamaihd.net/hero/doomfist/career-portrait.png");
$rank1 = imagecreatefrompng("$rank");
$border1 = imagecreatefrompng("$border");
$star1 = imagecreatefrompng("$stars");
$avatar1 = imagecreatefrompng("$avatar");

imagealphablending($hero1, true);
imagesavealpha($hero1, true);

/*
imagealphablending($avatar1, true);
imagesavealpha($avatar1, true);

imagealphablending($star1, true);
imagesavealpha($star1, true);

imagealphablending($border1, true);
imagesavealpha($border1, true);

imagealphablending($background, true);
imagesavealpha($background, true);

imagealphablending($hero1, true);
imagesavealpha($hero1, true);

imagealphablending($rank1, true);
imagesavealpha($rank1, true);

//Transparency Layers
$bg=imagecreatetruecolor(460,230);
imagealphablending($bg,false);

$col=imagecolorallocatealpha($bg,255,255,255,127);
imagefilledrectangle($bg,0,0,460,230,$col);
imagealphablending($bg,true);
*/

//Text
$white = imagecolorallocate($bg, 255, 255, 255);
$grey = imagecolorallocate($bg, 128, 128, 128);
$black = imagecolorallocate($bg, 0, 0, 0);
$font='./big_noodle_titling_oblique.ttf';
//$color = imagecolorallocate($bg, 140, 173, 209);
$text = $name;
$level2 = $level;
$sr2 = $sr;
// Add some shadow to the text
//imagettftext($bg, 48, 0, 11, 21, $grey, $font, $text);

// Add the text
//imagettftext($bg, 480, 0, 10, 20, $black, $font, $text);

//Transparency Layers above

//imagecolorallocatealpha($rank1, 0, 0, 0, 127);
//imagecolorallocatealpha($hero1, 0, 0, 0, 127);

//Combining 
/*
imagecopyresized($bg, $background, 0, 0, 0, 0, 460, 230, 460, 230);
imagecopyresized($bg, $rank1, 150, 105, 0, 0, 79.19, 79.19, 256, 256);
imagecopyresized($bg, $hero1, 110, 68, 0, 0, 396, 162, 1098, 449);
imagecopyresized($bg, $border1, 20, 68, 0, 0, 133.27, 133.27, 256, 256);
imagecopyresized($bg, $star1, 21, 141, 0, 0, 133.27, 66.63, 256, 128);
imagecopyresized($bg, $avatar1, 15, 40, 0, 0, 43.11, 43.11, 128, 128);
*/


$hero2 = imagescale($hero1, 396);
$rank2 = imagescale($rank1, 79);
$border2 = imagescale($border1, 133); 
$star2 = imagescale($star1, 133);
$avatar2 = imagescale($avatar1, 43);

//imagecopy($bg, $hero2, 110, 69, 0,0, 396, 162);
imagecopyresized($bg, $hero1, 110, 68, 0, 0, 396, 162, 1098, 449);
imagecopy($bg, $rank2, 149, 104,0,0, 79, 79);
imagecopy($bg, $border2, 20, 68, 0,0, 133, 133);
imagecopy($bg, $star2, 21, 141, 0,0, 133, 66);
imagecopy($bg, $avatar2, 15, 40, 0,0, 43, 43);


//header('Content-Type: image/png');
//imagepng($bg);
/*
imagedestroy($hero2);
imagedestroy($rank2);
imagedestroy($border2);
imagedestroy($bg);
imagedestroy($avatar2);
imagedestroy($star2);

imagedestroy($hero1);
imagedestroy($rank1);
imagedestroy($border1);
imagedestroy($avatar1);
imagedestroy($star1);
*/
//Text
imagettftext($bg, 40, 0, 65, 85, $black, $font, $text);
imagettftext($bg, 40, 0, 67, 83, $grey,  $font, $text);
imagettftext($bg, 40, 0, 69, 81, $white, $font, $text);

//Level
imagettftext($bg, 36, 0, 67, 155, $black, $font, $level2);
imagettftext($bg, 36, 0, 69, 153, $grey,  $font, $level2);
imagettftext($bg, 36, 0, 71, 151, $white, $font, $level2);

//SR
imagettftext($bg, 40, 0, 149, 215, $black, $font, $sr2);
imagettftext($bg, 40, 0, 151, 213, $grey,  $font, $sr2);
imagettftext($bg, 40, 0, 153, 211, $white, $font, $sr2);


//header('Content-Type: image/png');
imagealphablending($bg,true);
imagesavealpha($bg,true);
//imagepng($bg);
echo "Saving PNG";
imagepng($bg, "images/$user1.png");
echo "Done";
//Destroy all used resources
imagedestroy($hero2);
imagedestroy($rank2);
imagedestroy($border2);
imagedestroy($bg);
imagedestroy($avatar2);
imagedestroy($star2);

imagedestroy($hero1);
imagedestroy($rank1);
imagedestroy($border1);
imagedestroy($avatar1);
imagedestroy($star1);

imagedestroy($bg);
imagedestroy($hero1);
imagedestroy($rank1);
imagedestroy($background);
imagedestroy($star1);
imagedestroy($border1);
imagedestroy($avatar1);
imagedestroy($text);
imagedestroy($level2);
imagedestroy($sr2);

imagedestroy($hero2);
imagedestroy($rank2);
imagedestroy($border2);
imagedestroy($bg);
imagedestroy($avatar2);
imagedestroy($star2);

imagedestroy($hero1);
imagedestroy($rank1);
imagedestroy($border1);
imagedestroy($avatar1);
imagedestroy($star1);

imagedestroy($black);
imagedestroy($white);
imagedestroy($grey);
imagedestroy($level2);
imagedestroy($sr2);
imagedestroy($text);
imagedestroy($font);
imagedestroy($col);
header("Location: http://chukwumaokere.com/test/images/$user1.png");
//echo "http://chukwumaokere.com/test/images/Peekaboo-11628";
?>
