#!/usr/bin/php-cgi


<?php
//based on the other front end script, edit-ip.php, this tests if an input is a valid IP address and returns a 1 or 0
$val = $argv[1];
if (filter_var($val, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) or filter_var($val, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
  echo 1;
} else {
  echo 0;
}
?>
