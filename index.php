<?php

  $myNewPassword = new \admin\randomPassword(12);

  echo "<br /><br />\n\nUse the following randomly generated ".strlen(trim($myNewPassword->pass))." character password: \n<pre><code>".$myNewPassword->pass."</code></pre><br />\n";

?>
