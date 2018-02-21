<?php
$background = imagecreatefrompng('gibbg.png');
$ana= imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/hero/ana/career-portrait.png');
$genji = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/hero/genji/career-portrait.png');
$doomfist = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/hero/doomfist/career-portrait.png');
$rank= imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/rank-icons/season-2/rank-6.png');


$bg=imagecreatetruecolor(460,230);
imagealphablending($bg,true);

$col=imagecolorallocatealpha($bg,255,255,255,127);
imagefilledrectangle($bg,0,0,460,230,$col);
imagesavealpha($bg, true);

$rankScale = imagescale($rank, 79);
$anaScale = imagescale($ana, 396);
$genjiScale = imagescale($genji, 396);
$doomfistScale = imagescale($doomfist, 396);

imagealphablending($genjiScale,false);
imagesavealpha($genjiScale, true);
imagecopy($bg, $background, 0,0,0,0, 460, 230);
//imagealphablending($anaScale, false);
//imagesavealpha($anaScale, true);
imagecopy($bg, $doomfistScale, 110, 69, 0, 0, 396, 396);
imagecopy($bg, $rankScale, 0,0,0,0, 79,79);

header('Content-Type: image/png');
imagepng($bg);

imagedestroy($bg);
imagedestroy($col);
imagedestroy($ana);
imagedestroy($rank);
imagedestroy($rankScale);
imagedestroy($anaScale);
imagedestroy($genji);
imagedestroy($doomfistScale);
imagedestroy($doomfist);
imagedestroy($genji);

//we'll try using this
function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
        // creating a cut resource 
        $cut = imagecreatetruecolor($src_w, $src_h);

        // copying relevant section from background to the cut resource 
        imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);

        // copying relevant section from watermark to the cut resource 
        imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);

        // insert cut resource to destination image 
        imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
    }
