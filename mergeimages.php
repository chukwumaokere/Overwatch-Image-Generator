<?php 

$dest = imagecreatefrompng('vinyl1.png');
$src = imagecreatefrompng('cover1.png');

imagealphablending($dest, false);
imagesavealpha($dest, true);

imagecopymerge($dest, $src, 10, 9, 0, 0, 181, 180, 100); //have to play with these numbers for it to work for you, etc.

header('Content-Type: image/png');
imagepng($dest, 'merged.png');
imagepng($dest);
//file_put_contents('merged.png', $contents);
imagedestroy($dest);
imagedestroy($src);


