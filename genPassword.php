<?php 

namespace admin;

class randomPassword {

	function __construct($pswdLength=10) {
		$this->length = $pswdLength;
		$this->genPassword();
	}

    function genPassword() {

        // variable init
        $this->pass     =  '';
        $verified       =  false;
        $looper         =  0;
        $specials       =  '!#$%&*+,-:/>?_';  
        $characters     =  'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; // Letters and Numbers
        $allcharacters  =  $characters . $specials;  // Combining strings

        while ( ($verified == false) & $looper < 1000 ){
            $this->pass =  substr(str_shuffle($allcharacters), rand($this->length, strlen($allcharacters)-$this->length), $this->length);

            $verified   =  (((preg_match("#[0-9]+#", $this->pass)) && (preg_match("#[a-z]+#", $this->pass)) && (preg_match("#[A-Z]+#", $this->pass)) && (strpbrk($this->pass, $specials)) && (strlen(trim($this->pass)) == $this->length)) ? true : false);

            echo (!$verified ?"<!-- Password Verify Check Failed for [".$this->pass."], looping again. -->\n" : '');

            $looper++;  // Keeps the checker process from looping forever. Shouldn't need this many attempts to get a valid password.
        }
        return $this->pass; // return the generated & verified password
    }
}

?>
