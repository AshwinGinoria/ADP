<?php
    // Specifying Mysql Connection Variables
    $dbhost = 'localhost';
    $dbuser = 'ashwin';
    $dbpass = '1999';
    $dbname = 'miniProject';
    $tablename = 'Pollution';

    // Establishing Connection to Mysql server
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // Error Check
    if (!$conn) {
        die("Could not connect: ". mysqli_connect_error($conn));
    }

    // SQL QUERY
    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$dbname}' AND TABLE_NAME = '$tablename'";

    // Fetching Data
    $columns = mysqli_query($conn, $query);
    
    // Iterating over row Adding options in DropDown
    while ($column = mysqli_fetch_row($columns)) {
        if ($column[0] != 'time') {
            echo "<option id='Option' value='{$column[0]}'>{$column[0]}</option>";
        }
    }

    // Closing Mysqli Connection
    mysqli_close($conn);
?>