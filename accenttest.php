<?php

$user1 = $argv[1];
        $encod = utf8_encode($user1);
        $user =  rawurlencode($encod);
//$user = $encod;
        $clean = str_replace('%83%C2', '', $user);

echo $user1;
