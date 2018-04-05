<?php
    $conn = new mysqli("localhost", "root","" , "sqlinjecttest");
    if($conn->connect_error){
        echo "connection failed";
    }

    $usern = $_POST['user'];
    $passw = $_POST['pass'];

    $stmt = $conn->prepare("SELECT * FROM sqlinject WHERE uname = ? AND pword = ?");
    $stmt->bind_param("ss", $usern, $passw );

    $stmt->execute();
    $stmt -> store_result();
    $num = $stmt -> num_rows;
    echo "This returned back ". $num.  " rows";
?>