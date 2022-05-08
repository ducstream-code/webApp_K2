<?php

// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "phpqrcode/qrlib.php";

QRcode::png('code data text', 'filename.png'); // creates file
