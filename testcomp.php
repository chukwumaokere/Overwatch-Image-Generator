<?php
$html='
.masthead-hero-image.quickplay {
    background-image:url(https://d1u1mce87gyfbn.cloudfront.net/hero/mccree/career-portrait.png);
}
.masthead-hero-image.competitive {
    background-image:url(https://d1u1mce87gyfbn.cloudfront.net/hero/winston/career-portrait.png);
}';

preg_match('/competitive\s{\s+\S+https\S+portrait\S+g/', $html, $heroArray, PREG_OFFSET_CAPTURE);
$hero = $heroArray[0][0];
//$hero = str_replace("competitive{\nbackground-image:url(", "", $hero);
$pos = strpos($hero, "http");
$herostart = strpbrk($hero, 'h');
var_dump($herostart);
var_dump($pos);
var_dump($hero);

/*

$text='s a b {
c';

preg_match('/a\sb\s{\sc/', $text, $someary, PREG_OFFSET_CAPTURE);
$sum = $someary;
var_dump($sum);
*/
