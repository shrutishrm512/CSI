<?php
$con=mysqli_connect("localhost","root","password");
$sql="CREATE DATABASE CSIApp";
if (mysqli_query($con,$sql))
{
   echo "Database my_db created successfully";
}
?>
