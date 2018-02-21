<?php
//$_REQUEST['bnet'];
if(!$_REQUEST['bnet']){
	$user1 = $argv[1];
}else{
	$user1 = $_REQUEST['bnet'];
}
        $encod = utf8_encode($user1);
        $user =  rawurlencode($encod);
        $clean = str_replace('%83%C2', '', $user);

//echo $clean;
echo "php profile.php $clean 2>&1";
exec("php profile.php $clean 2>&1");
?>
