<?php

session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "123456";
$DB_name = "resorta";

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};charset=utf8",$DB_user,$DB_pass);
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
}
catch(PDOException $e)
{
	echo $e->getMessage();
}


include_once 'class.user.php';
$user = new USER($DB_con);
?>