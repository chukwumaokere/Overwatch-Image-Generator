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


$dest = imagecreatefrompng("$hero");
$src = imagecreatefrompng("$rank");

imagealphablending($dest, true);
imagesavealpha($dest, true);

imagealphablending($src, true);
imagesavealpha($src, true);


//imagescale($dest, 396, 161.92);
//$some = imagecreate(460, 230);

$dest2 = resize($dest, 396, 162);
$src2 = resize($src, 79.19, 79.19);

//imagecopyresized($dest, $dest, 0, 0, 0, 0, 396, 161.92, 1098, 449);
imagecopyresized($src, $src, 10, 10, 0, 0, 79.19, 79.19, 256, 256);
//$img2 = imagecopymerge($dest, $src, 0, 0, 0, 0, 256, 256, 100); //have to play with these numbers for it to work for you, etc.
imagecopymerge($dest2, $src2, 0, 0, 0, 0, 460, 230, 50);

header('Content-Type: image/png');
/* $fileName = "images/$clean.png"; 
imagepng($dest, 'merged2.png');	
imagepng($dest2, $fileName);
*/
imagepng($dest2);
//file_put_contents('merged.png', $contents);
imagedestroy($dest);
imagedestroy($src);
imagedestroy($some);
imagedestroy($dest2);
imagedestroy($src2);
imagedestroy($img2);
imagedestroy($temp);
//imagedestroy($then);

function resize($img, $width, $height, $stretch = false)
    {
        $temp = imagecreatetruecolor($width, $height);
        imagealphablending($temp, true);
        imagesavealpha($temp, true);

        $bg = imagecolorallocatealpha($temp, 0, 0, 0, 0); // Background color
        imagefill($temp, 0, 0, $bg);

        if ($stretch)
        {
            imagecopyresampled($temp, img, 0, 0, 0, 0, $width, $height, imagesx($img), imagesy($img)); 
        }
        else
        {          
            if (imagesx($img) <= $width && imagesy($img) <= $height)
            {
                $fwidth = imagesx($img);
                $fheight = imagesy($img);
            }
            else
            {
                $wscale = $width / imagesx($img);
                $hscale = $height / imagesy($img);
                $scale = min($wscale, $hscale);
                $fwidth = $scale * imagesx($img);
                $fheight = $scale * imagesy($img);
            }
            imagecopyresampled($temp,                             
                $img,                                      
                ($width - $fwidth) / 2, ($height - $fheight) / 2,   
                0, 0,                                              
                $fwidth, $fheight,                                 
                imagesx($img), imagesy($img)               
            );
        }
        return $temp; 
    }
