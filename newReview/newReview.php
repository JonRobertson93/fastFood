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

// Insert user data into table
// $city = $mysqli->real_escape_string($city);

//$review = $mysqli->real_escape_string($review);

$restName = $_POST['restaurantName'];
$address1 = $_POST['addressOne'];
$address2 = $_POST['addressTwo'];
$city = $_POST['city'];
$state = $_POST['state'];
$review = $_POST['reviewBox'];
$toilets = $_POST['starSelector'];
$heading = $_POST['reviewHeading'];


$restName = mysqli_real_escape_string($conn, $restName);
$address1 = mysqli_real_escape_string($conn, $address1);
$address2 = mysqli_real_escape_string($conn, $address2);
$city = mysqli_real_escape_string($conn, $city);
$state = mysqli_real_escape_string($conn, $state);
$review = mysqli_real_escape_string($conn, $review);
$toilets = mysqli_real_escape_string($conn, $toilets);
$heading = mysqli_real_escape_string($conn, $heading);

$insert = "INSERT INTO reviews (restname, address1, address2, city, state, heading, review, toilets, username) VALUES ('$restName', '$address1', '$address2', '$city', '$state', '$heading', '$review', '$toilets', 'user')";

// Success/failure for INSERT
if (!mysqli_query($conn, $insert)) {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
}
mysqli_query($conn, "DELETE FROM nameAddress");
mysqli_query($conn, "INSERT INTO nameAddress (nameAddress) SELECT concat(restname, ', ', address1, ', ', city, ', ', state) FROM reviews");

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Restroom Rater Reviews </title>
    <link href="../style.css" rel="stylesheet">
    <link href="../responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <!-- FOR SEARCH BAR -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>
  <body>
  	<div id = "container">
	    <div id="navbar">
	    	<h1 id = "siteTitle"> <a href="http://jonrobertson.tech/restrooms" alt="Link to restroom rater home"> <i class="fas fa-star"></i> Restroom <span class="golden"> Rater </span> </a></h1>
				<p class="bigLinks"> <a href="http://jonrobertson.tech/">Portfolio Home</a> </p>
				<p class="bigLinks"> <a href="../login/login.html">Sign In/Register</a> </p>
				<i id="hamburger" class="fas fa-bars"></i>
				<p class="navLinks hidden"> <a href="http://jonrobertson.tech/">Portfolio Home</a></p>
				<p class="navLinks hidden"> <a href="../login/login.html">Sign In/Register</a> </p>
	    </div>
        <div style="margin-top: 8em; height: 900px">
            <h2> Thank you for your review! </h2>
            <a href="http://brokenheadphones.store/"> Return to the homepage </a>
        </div>
    </div>
    <script src="../js/hamburger.js"></script>
    </body>
</html>