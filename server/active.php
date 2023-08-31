<?php
$activePageMap = array(
    'categories.php' => 'categories',
    'assets.php' => 'assets',
    'users.php' => 'users',
    'user_asset.php' => 'user_asset',
    'dashboard.php' => 'dashboard'
);

$currentFile = basename($_SERVER['PHP_SELF']);
$activePage = isset($activePageMap[$currentFile]) ? $activePageMap[$currentFile] : '';

