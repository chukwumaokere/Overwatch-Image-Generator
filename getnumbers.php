<?php
$url = "https://playoverwatch.com/en-us/career/pc/us/TheRedMan-11954";
$contents = file_get_contents($url);
$levelContents = '<div class="u-vertical-center">85</div>';
//preg_match('/(http)\S+rank\S+(g)/' , $contents, $rankArray, PREG_OFFSET_CAPTURE);
preg_match('/u-vertical-center">\S+(<)/', $contents, $levelArray, PREG_OFFSET_CAPTURE);
$levelString = $levelArray[0][0];
//var_dump($levelArray);
$levelRaw = filter_var($levelString, FILTER_SANITIZE_NUMBER_INT);
$level = str_replace('--', '', $levelRaw);
//echo $level;

preg_match('/(https)\S+(portrait)\S+(g)/', $contents, $heroArray, PREG_OFFSET_CAPTURE);
$hero = $heroArray[0][0];
//echo $hero . "\n";

preg_match('/(http)\S+rank\S+(g)/' , $contents, $rankArray, PREG_OFFSET_CAPTURE);
$rank = $rankArray[0][0];

preg_match('/u-align-center h5">\S+</', $contents, $srArray, PREG_OFFSET_CAPTURE);
$srString = $srArray[0][0];
$srRaw = filter_var($srString, FILTER_SANITIZE_NUMBER_INT);
$sr = str_replace('--5', '', $srRaw);

echo $rank . "\n";
