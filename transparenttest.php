<?php

$background = imagecreatefrompng('gibbg.png');
$hero = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/hero/ana/career-portrait.png');
$rank = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/rank-icons/season-2/rank-6.png');
$border = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/playerlevelrewards/0x025000000000094D_Border.png');
$star = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/playerlevelrewards/0x025000000000094D_Rank.png');
$avatar = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/unlocks/0x0250000000001195.png');

imagealphablending($avatar, true);
imagesavealpha($avatar, true);

imagealphablending($star, true);
imagesavealpha($star, true);

imagealphablending($border, true);
imagesavealpha($border, true);

imagealphablending($background, true);
imagesavealpha($background, true);

imagealphablending($hero, true);
imagesavealpha($hero, true);

imagealphablending($rank, true);
imagesavealpha($rank, true);

//Transparency Layers
$bg=imagecreatetruecolor(460,230);
imagealphablending($bg,false);

$col=imagecolorallocatealpha($bg,255,255,255,127);
imagefilledrectangle($bg,0,0,460,230,$col);
imagealphablending($bg,true);

$font='big_noodle_titling_oblique.ttf';
$color = imagecolorallocate($bg, 140, 173, 209);
imagettftext($img,48,0,10,20,$color,$font,'Text goes here');
//Transparency Layers above

imagecolorallocatealpha($rank, 0, 0, 0, 127);
imagecolorallocatealpha($hero, 0, 0, 0, 127);


//Combining 
imagecopyresized($bg, $background, 0, 0, 0, 0, 460, 230, 460, 230);
imagecopyresized($bg, $rank, 150, 105, 0, 0, 79.19, 79.19, 256, 256);
imagecopyresized($bg, $hero, 110, 68, 0, 0, 396, 162, 1098, 449);
imagecopyresized($bg, $border, 20, 68, 0, 0, 133.27, 133.27, 256, 256);
imagecopyresized($bg, $star, 21, 141, 0, 0, 133.27, 66.63, 256, 128);
imagecopyresized($bg, $avatar, 10, 40, 0, 0, 43.11, 43.11, 128, 128);

header('Content-Type: image/png');
imagealphablending($bg,false);
imagesavealpha($bg,true);
imagepng($bg);

imagedestroy($bg);
imagedestroy($hero);
imagedestroy($rank);
imagedestroy($background);
imagedestroy($star);
imagedestroy($border);
imagedestroy($avatar);
