<?php

// Set proper paths for Vercel
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';

// Change to Laravel root directory
chdir(__DIR__ . '/..');

// Include Laravel's public/index.php
require_once __DIR__ . '/../public/index.php';