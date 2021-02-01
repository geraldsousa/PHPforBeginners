<?php

/**
 * Get the message
 * @param boolean $morning true if morning, false otherwise
 * 
 * @return string message relevant to if it's morning or not
 */

function showMessage($name = "Bob") {
    return "Hello $name";
}

$message = showMessage("Steve");
echo $message;

function getMessage($morning) {
    if ($morning) {
        return "Good Morning!";
    } else {
        return "Good afternoon?";
    }
}
echo "    <br>  ";

$msg = getMessage(false);
echo $msg;