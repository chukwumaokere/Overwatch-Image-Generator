<?php 

$dest = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/hero/ana/career-portrait.png');
$src = imagecreatefrompng('https://blzgdapipro-a.akamaihd.net/game/rank-icons/season-2/rank-6.png');

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
imagecopymerge($dest2, $src2, 0, 0, 0, 0, 460, 230, 0);

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
