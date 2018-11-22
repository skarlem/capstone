<?php

$var = base64_encode('carl');
echo $var;
echo md5(base64_decode($var));

?>