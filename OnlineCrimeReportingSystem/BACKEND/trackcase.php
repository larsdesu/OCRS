<?php 
$conn = new mysqli('localhost', 'root', '', 'dbcrimereport');

if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);}

    $searchTerm = '';
?>