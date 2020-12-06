<?php

function randomPassword($length=10) {

    // variable init
    $pass          =  '';
    $verified      =  false;
    $looper        =  0;

    // Characters Lists
    $specials      =  '!#$%&()*+,-:;/=>?_';  // Only the specials needed for verifications.
    $characters    =  'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; // Letters and Numbers
    $allcharacters =  $characters . $specials;  // Combining strings

    while ( ($verified == false) & $looper < 1000 ){
        $pass      =  substr(str_shuffle($allcharacters), rand($length, strlen($allcharacters)-$length), $length);

        $verified  =  (((preg_match("#[0-9]+#", $pass)) && (preg_match("#[a-z]+#", $pass)) && (preg_match("#[A-Z]+#", $pass)) && (strpbrk($pass, $specials)) && (strlen(trim($pass)) == $length)) ? true : false);

        $looper++;  // Keeps the checker process from looping forever. Shouldn't need this many attempts to get a valid password.
    }
    return $pass; // return the generated & verified password
}

$my_passwords = randomPassword(12);

echo "<br /><br />\n\nUse the following randomly generated ".strlen(trim($my_passwords))." character password: \n<pre><code>".$my_passwords."</code></pre><br />\n";


?>
