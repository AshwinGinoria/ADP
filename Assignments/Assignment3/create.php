<?php
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "1999";
$database_name = $_POST["DatabaseName"];
$table_name = $_POST["TableName"];

// Create connection
$conn = new mysqli($servername, $username, $password);


// Create database
$query = "CREATE DATABASE $database_name";
$conn->query($query);
OR_DIE("Error creating database: " . $conn->error);

// Using the Created Database
$query = "USE $database_name";
$conn->query($query);
OR_DIE("Error accessing database: " . $conn->error);

// Creating Table
$query = "CREATE TABLE $table_name (id int(6) NOT NULL PRIMARY KEY ,Name varchar(30) NOT NULL, Email varchar(50), Contact int(11), Address varchar(200))";
$conn->query($query);
OR_DIE("Error creating table: " . $conn->error);

$conn->close();
?>