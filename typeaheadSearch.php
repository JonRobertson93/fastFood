<?php
    $key=$_GET['key'];
    $array = array();

    $servername = "localhost";
    $database = "u785025458_cart";
    $username = "u785025458_jon";
    $password = "EXgg8s65UnDY";

    // Create connection

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    $query = mysqli_query($conn, "SELECT nameAddress FROM nameAddress WHERE nameAddress LIKE '%{$key}%'");
    
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['nameAddress'];
    }
    echo json_encode($array);
    
    mysqli_close($conn);
?>
