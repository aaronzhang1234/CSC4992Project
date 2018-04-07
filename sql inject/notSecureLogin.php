<?php
    $conn = new mysqli("localhost", "root","" , "sqlinjecttest");
    if($conn->connect_error){
        echo "connection failed";
    }

    $usern = $_POST['user'];
    $passw = $_POST['pass'];

    $query = mysqli_query($conn, "SELECT * FROM sqlinject where uname = '$usern' AND pword = '$passw'"); 
    $row = mysqli_fetch_array($query); 
    if(!empty($row['uname']) AND !empty($row['pword'])){ 
        echo "You Logged In"; 
    }else{ 
        echo "Failed to Login"; 
    }
?>