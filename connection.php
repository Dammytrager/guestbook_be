<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description");

$host = 'us-cdbr-iron-east-03.cleardb.net';
$user = 'bce1f3a10927be';
$password = '19e7c7d1';
$database = 'heroku_2d7302eda77b267';

$db = mysqli_connect($host, $user, $password, $database);
