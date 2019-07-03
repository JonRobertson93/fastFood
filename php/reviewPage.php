<?php
$servername = "localhost";
$database = "u785025458_cart";
$username = "u785025458_jon";
$password = "EXgg8s65UnDY";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check for successful connection
if (!$conn) { die ("Connection to the Database failed! " . mysqli_connect_error()); }

// Query the database table for the search that matches
// TODO - has to match more than just restaurant name
$text = $_POST['typeahead'];
$text = mysqli_real_escape_string($conn, $text);

// check for valid search text input 
if (!$text) { die("Error regarding your search text! " . mysqli_connect_error());}

// split input into each column
$searchWords = explode(",", $text);
$name = trim($searchWords[0]);
$address = trim($searchWords[1]);
$city = trim($searchWords[2]);
$state = trim($searchWords[3]);

// Perform SELECT query
$display = mysqli_query($conn, "SELECT * FROM reviews WHERE restname LIKE '%$name%' AND address1 LIKE '%$address%'");

// Check connection for $display
if (!$display) {echo "Error: Issue connecting to database. " .$display . mysqli_error($conn);}

// TODO - WORK ON THIS TO GET AVERAGE RATING
// mysqli_query returns an object...need to use fetch_array() to get int

$aveRating = mysqli_query($conn, "SELECT AVG(toilets) FROM reviews WHERE restname LIKE '%$name%' AND address1 LIKE '%$address%'");

$result = $aveRating->fetch_array();
$average = round((float)$result[0], 1);


// THIS QUERY WORKS IN THE DB, BUT IT WONT DISPLAY CORRECTLY HERE FOR SOME REASON
if (!$aveRating) {echo "Error: Cannot find average rating for review text in database. " .$aveRating . mysqli_error($conn);}


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
	    	<h1 id = "siteTitle"> <a href="http://jonrobertson.tech/restrooms/" alt="Link to restroom rater home"> <i class="fas fa-star"></i> Restroom <span class="golden"> Rater </span> </a></h1>
				<p class="bigLinks"> <a href="http://jonrobertson.tech/">Portfolio Home</a> </p>
				<p class="bigLinks"> <a href="../login/login.html">Sign In/Register</a> </p>
				<i id="hamburger" class="fas fa-bars"></i>
				<p class="navLinks hidden"> <a href="http://jonrobertson.tech/">Portfolio Home</a></p>
				<p class="navLinks hidden"><a href="../login/login.html">Sign In/Register</a>  </p>
	    </div>
        <div id="reviewsDiv">
            <?php
            echo "<h1> Reviews for " . stripslashes($name) . "</h1>";
            echo "<p>" . $address . ", " . $city . ", " . $state . "</p>";
            echo "<h2> <i> Average Rating: " . $average . "/5 </i></h2>";


            while ($row = mysqli_fetch_array($display)) {
                echo "<table class='table'> <tbody> <tr>";
                echo "<td class='reviewHeading'>" . $row['heading'] . "</td> </tr>";
                echo "<tr><td class='numberToToilets'>" . $row['toilets'] ."</i></td></tr>";
                echo "<tr> <td> <i> Reviewed by " .$row['username'] . " on ";
                echo $row['date'] ."</i></td></tr>";
                echo "<tr> <td class='reviewText'>" .$row['review'] ."</td>";
                echo "<tr> <td> <i> Was this review helpful?</i> <i class='fas fa-thumbs-up'></i><i class='fas fa-thumbs-down'> </i> </td> </tr> </tbody> </table>";  
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <script src="../js/reviewPage.js"></script>
    <script src="../js/hamburger.js"></script>
</body>
</html>