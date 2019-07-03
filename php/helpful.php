<?php
$servername = "localhost";
$database = u785025458_cart;
$username = u785025458_jon;
$password = EXgg8s65UnDY;

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// session_start();

// $tUp = $_SESSION["thumbsUp"];
// $tDown = $_SESSION["thumbsDown"];

// if ($tUp == 0) {
//     // increment global SESSION thumbsUp variable
//     $tUp++;
//     // Update database to increment 'helpful' by 1

     $updating = mysqli_query($conn, "UPDATE reviews SET helpful = helpful + 1 WHERE reviewID = 7");
    
//     //check if tDown == 1. Then decrement once
//     if ($tDown == 1) {
//         $tDown--;
//     }
// }



mysqli_close($conn);
?>