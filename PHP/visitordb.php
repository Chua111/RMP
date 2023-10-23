<?php
$name = $_POST["name"];
$vehicleno = $_POST["vehicleno"];
$unitno = $_POST["unitno"];
$category = $_POST["category"];
$visitpurpose = $_POST["visitpurpose"];

if (!$name || !$vehicleno || !$unitno || !$category || !$visitpurpose){
    die("Please fill in all the necessary input");
}

#Print data value from form
#var_dump($name, $vehicleno, $unitno, $category, $visitpurpose);

#variable for connection details
$host = "localhost";
$dbname = "rm";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

#if (mysqli_connect_errorno()){
#    die("Connection error: " .mysqli_connect_errorno());
#}

$sql = "INSERT INTO rm (name, vehicleno, unitno, category, visitpurpose)
        VALUES (?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

?>