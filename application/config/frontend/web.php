<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
$fo = str_replace("index.php","", $_SERVER['SCRIPT_NAME']);
$config['images'] = "$http" . $_SERVER['SERVER_NAME'] . "" . $fo . 'assets/frontend/images/';

$config['css'] = "$http" . $_SERVER['SERVER_NAME'] . "" . $fo . 'assets/frontend/css/';
$config['js'] = "$http" . $_SERVER['SERVER_NAME'] . "" . $fo . 'assets/frontend/js/';
