<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require(__DIR__ . '/../../functions.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$authors = file(__DIR__ .'/authors_list.txt');

$trimmed_authors = array_map('trim', $authors);

//debug($authors);
//die;

foreach ($trimmed_authors as $a) {
    
$sql = "INSERT INTO authors (author_name)
        VALUES ('{$a}')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
    
}



$conn->close();