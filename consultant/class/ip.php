<?php
 class UserIP{ public static function getIP(){ if (isset($_SERVER['REMOTE_ADDR']))$ip = $_SERVER['REMOTE_ADDR']; if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = trim(strtok($_SERVER['HTTP_X_FORWARDED_FOR'], ',')); if (isset($_SERVER['HTTP_CLIENT_IP'])) $ip = $_SERVER['HTTP_CLIENT_IP']; if (isset($_SERVER['HTTP_X_REAL_IP'])) $ip = $_SERVER['HTTP_X_REAL_IP']; return sprintf("%u\n", ip2long($ip)); } } ?>
