<?php
$bg = imagecreatefrompng('./gibbg.png');
$dest = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/hero/ana/career-portrait.png');
$src = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/rank-icons/season-2/rank-6.png');

$hero1 = imagecreatefrompng("$hero");
$rank1 = imagecreatefrompng("$rank");
$border1 = imagecreatefrompng("$border");
$star1 = imagecreatefrompng("$stars");
$avatar1 = imagecreatefrompng("$avatar");

$hero2 = imagescale($hero1, 396);
$rank2 = imagescale($rank1, 79);
$border2 = imagescale($border1, 133);
$star2 = imagescale($star1, 133);
$avatar2 = imagescale($avatar1, 43); 

imagecopy($bg, $hero2, 110, 68, 0,0, 396, 396);
imagecopy($bg, $rank2, 150, 105,0,0, 79, 79);
imagecopy($bg, $border2, 20, 68, 0,0, 133, 133);
imagecopy($bg, $star2, 21, 141, 0,0, 133, 133);
imagecopy($bg, $avatar2, 15, 40, 0,0, 43, 43);


header('Content-Type: image/png');
imagepng($bg);

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
