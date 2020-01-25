<?php
session_start();
error_reporting(E_ALL);
ini_set('display', 'on');

$host = 'localhost';
$login = 'root';
$pass = '';
$dbName = 'test';

$connect = mysqli_connect($host, $login, $pass, $dbName) or die(mysqli_error($connect));
mysqli_query($connect, "SET NAMES 'utf8'");