<?php

include_once('DebugToConsole.php');

function validateLogin($login){
    $debbug = new DebugToConsole();
    if(preg_match("/[A-Za-z_0-9]{3,20}/", $login)){
        $debbug->console_log("login is correct");
        return true;
    }else{
        $debbug->console_log("login is incorrect");
        return false;
    }
}

?>