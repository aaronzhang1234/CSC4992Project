<?php
    echo $_POST["user"];
    echo "<br>";
    echo $_POST["pass"];
    echo "<br>";
    $usern = $_POST["user"];
    $passw = $_POST["pass"];
    $conn = new mysqli("localhost", "root","" , "sqlinjecttest");
    if($conn->connect_error){
        echo "connection failed";
    }
    $sql = "SELECT * FROM sqlinject WHERE uname = '".$usern."' AND pword = '".$passw."'";
    echo $sql;
    
    $result = $conn->query($sql);
    echo "<br>"; 
    if($result){
        echo "New record created successfully";
    }else{
        echo "failed :(";
    }
    
?>