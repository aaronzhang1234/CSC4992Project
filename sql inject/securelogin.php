<?php
    $conn = new mysqli("localhost", "root","" , "sqlinjecttest");
    if($conn->connect_error){
        echo "connection failed";
    }

    $usern = $_POST['user'];
    $passw = $_POST['pass'];

    //Prepared Statements.
    echo "SQL prevention Using prepared Statements";
    echo "<br>";
    echo "User Name = $usern<br>";
    echo "Password =  $passw<br>";
    $stmt = $conn->prepare("SELECT * FROM sqlinject WHERE uname = ? AND pword = ?");
    $stmt->bind_param("ss", $usern, $passw );

    $stmt->execute();
    $stmt -> store_result();
    $num = $stmt -> num_rows;
    if($num>0){
        echo "Successfully Logged In";
    }else{
        echo "Failed to Login";
    }
    echo "<br><br>";

    //Remove nonalphanumeric symbols
    echo "SQL prevention removing all non alpha numeric statements";
    echo "<br>";
    $passw = preg_replace("/[^A-Za-z0-9]/", '', $passw);
    $usern = preg_replace("/[^A-Za-z0-9]/", '', $usern);
    echo "User Name = $usern<br>";
    echo "Password =  $passw<br>";
    $query = mysqli_query($conn, "SELECT * FROM sqlinject where uname = '$usern' AND pword = '$passw'"); 
    $row = mysqli_fetch_array($query); 
    if(!empty($row['uname']) AND !empty($row['pword'])){ 
        echo "You Logged In"; 
    }else{ 
        echo "Failed to Login"; 
    }

    //Remove 
?>