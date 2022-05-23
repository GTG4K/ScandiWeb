<?php

define("WEBSITE_NAME", "Scandiweb");

/* db variables */

// if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DB_TYPE', 'mysql');
    define('DB_NAME', 'scandiweb');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_HOST', 'localhost');
// }else{
//     define('DB_TYPE', 'mysql');
//     define('DB_NAME', 'id18967164_scandiweb');
//     define('DB_USER', 'id18967164_root');
//     define('DB_PASS', '#S_d7RR<$?C{dZGc');
//     define('DB_HOST', 'localhost');
// }

/* protocal */

define('PROTOCAL', 'http');

/* PATHS */
$path = str_replace('\\', '/',PROTOCAL . '://' . $_SERVER['SERVER_NAME'] . __DIR__ . '/');
$path = str_replace($_SERVER['DOCUMENT_ROOT'],'',$path);

define('ROOT', str_replace('app/core', 'public', $path));
define('ASSETS', str_replace('app/core', 'public/assets', $path));

/* DEBUG */
define('DEBUG', true);

if(DEBUG)
{
    ini_set("display_errors", 1);
}else{
    ini_set("display_errors", 0);
}
