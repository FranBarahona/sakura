<?php

$conn = new mysqli('localhost', 'root', '', 'restaurante');
if($conn->connect_error)
{
echo $error = $conn->connect_error;
}





?>
