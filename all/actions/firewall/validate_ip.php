#!/usr/bin/php-cgi
<?php
$val = $argv[1];
if (filter_var($val, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) or filter_var($val, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
  echo 1;
} else {
  echo 0;
}
?>
