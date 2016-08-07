<?php
session_start();
ob_start();
if (!$_SESSION['admin']){
    header("Location: login.php");
  }
include 'bagianHeader.php';
include_once 'inc/config.php';
include 'inc/class.coupon.php';
include 'inc/fusioncharts.php';
//require 'inc/seguridad.php';
require 'inc/fpdf/fpdf.php';
//require_once 'inc/PEAR2/Autoload.php';
require_once 'inc/routeros_api.class.php';


$perintah = mysqli_query($link,"SELECT * FROM mik WHERE id_mik='1'") or die(mysqli_error());
$row = mysqli_fetch_assoc($perintah);

error_reporting (E_ALL ^ E_NOTICE); 
$ip = $row['ip_mik'];
$user = $row['username_mik'];
$password = $row['password_mik'];

$API = new RouterosAPI();
$API->debug = false;
$API->connect($ip, $user, $password);

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');   
    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}

if(isset($_GET['page'])){
	if(!file_exists('pages/'.$_GET['page'].'.php')){
		include('pages/404.php');
	}else{
		include('pages/'.$_GET['page'].'.php');
	}
}else{
	include('pages/home.php');
}

include 'bagianFooter.php';
?>