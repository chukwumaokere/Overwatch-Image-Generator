<?php
$test = $argv[1];
//$test = $_REQUEST["bnet"];
//https://playoverwatch.com/en-us/career/pc/us/Pin%C3%B3t-1367
// https://playoverwatch.com/en-us/career/pc/us/Ros%C3%A9-11914
// U+00F3	ó b3	LATIN SMALL LETTER O WITH ACUTE
// c3 b3
// c3 a9
 
$newtest = iconv("ISO-8859-1",'UTF-8',$test);

$word = "Pin\xC3\xB3t";

$test2 = rawurldecode('Pin%C3%B3t');
$newtest = rawurlencode($word);

//$url = "https://playoverwatch.com/en-us/career/pc/us/Pin%C3%B3t-1367";
$utf8 = html_entity_decode("&#xC3B3;", ENT_COMPAT, 'UTF-8');
$converted = iconv("UTF-8", "WINDOWS-1252", $test);
$another = urlencode($test);

echo $test;
echo "\n <br>";
echo $newtest;
echo "\n";
echo $test2;
//echo "\n";
//echo $utf8;
echo "\n";
/*
echo $converted;
echo "\n";
echo $another;
*/
//$str = "Riferimento-a-\xE2\x82\xAC-9-90";

//$encoded = rawurlencode($str);

//echo $encoded;
//echo "\n";

$encod = utf8_encode($test);
echo $encod;
echo "\n";

$encod2 =  rawurlencode($encod);
echo $encod2;
echo "\n";
$questionable = "%83%C2";
$question = rawurldecode($questionable);
$decode = rawurldecode($encod2);
$secondlayer = rawurlencode($$question);
echo "decode is $decode \n";
echo "question is $question \n";
echo "second layer is $secondlayer \n";
