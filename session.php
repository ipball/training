<?php
session_start();
$_SESSION = array();
$_SESSION['fullname'] = 'Songying Jaidee';
$_SESSION['company'] = 'Computer System';
echo $_SESSION['fullname'];
echo '<br/>';
echo $_SESSION['company'];

unset($_SESSION['fullname']);
//session_destroy();

echo !empty($_SESSION['fullname']) ? $_SESSION['fullname'] : '';
echo '<br/>';
echo $_SESSION['company'];
