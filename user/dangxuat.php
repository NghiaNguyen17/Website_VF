<?php

@include 'xuly.php';

session_start();
session_unset();
session_destroy();

header('location:..\trangchu.php');

?>