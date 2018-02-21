<?php
$bg = imagecreatefrompng('./gibbg.png');
$dest = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/hero/genji/career-portrait.png');
$src = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/rank-icons/season-2/rank-6.png');
$stars = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/playerlevelrewards/0x025000000000094D_Rank.png');
//genji https://blzgdapipro-a.akamaihd.net/hero/genji/career-portrait.png
//ana https://blzgdapipro-a.akamaihd.net/hero/ana/career-portrait.png
//imagealphablending($dest, true);
//imagesavealpha($dest, true);
$dest2 = imagescale($dest, 396);
$src2 = imagescale($src, 79);
$stars2 = imagescale($stars, 133);
//imagealphablending($dest2, true);
//imagesavealpha($dest2, true);
//imagealphablending($bg, true);
//imagesavealpha($bg, true);

//imagecopyresized($bg, $dest2, 110, 68,0,0, 396, 162, 0, 0);
//imagecopyresized($bg, $dest, 110, 68, 0, 0, 396, 162, 1098, 449);

imagecopymerge($dest, $dest, 0, 0, 0, 0, 1098, 449, 50);
//imagecopy($bg, $src2, 0, 0,0,0, 79, 79);
//imagecopy($bg, $stars2, 0,0,0,0, 133, 66);
imagealphablending($bg, false);
imagesavealpha($bg, true);
header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
imagedestroy($dest2);
imagedestroy($src2);
imagedestroy($bg);
