<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gradedb";

$conn = mysqli_connect($dbServerName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Connection Failed:" . mysqli_connect_error());
}