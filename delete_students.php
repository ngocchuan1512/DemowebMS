<?php 
$rollno = $_GET['srollno'];
// echo $rollno;

//ket noi
$_servername = "localhost";
$_username = "root";
$_password = "";
$_dbname = "btecs_database";
$conn = new mysqli($_servername, $_username, $_password, $_dbname);

$delete_sql = "DELETE From students WHERE rollno=$rollno";

mysqli_query($conn, $delete_sql);{
// echo "<h1>Delete Success</h1>";

header("Location: display_students.php");
}