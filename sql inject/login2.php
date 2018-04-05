<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sqlinjecttest');
    define('DB_USER','root');
    define('DB_PASSWORD','');

    $conn = new mysqli(DB_HOST, DB_USER,DB_PASSWORD,DB_NAME)or die("Failed to connect to MySQL: " . mysql_error());

    $usern = $_POST['user'];
    $passw = $_POST['pass'];

    SignIn();

    function SignIn()
    {
    $conn = new mysqli(DB_HOST, DB_USER,DB_PASSWORD,DB_NAME)or die("Failed to connect to MySQL: " . mysqli_error());
    if(!empty($_POST['user']))
    {
        $usern = $_POST['user'];
        $passw = $_POST['pass'];
        $query = mysqli_query($conn, "SELECT * FROM sqlinject where uname = '$_POST[user]' AND pword = '$_POST[pass]'") or die(mysqli_error($conn)); 
        echo "<br>";
        echo "SELECT * FROM sqlinject where uname = '$_POST[user]' AND pword = '$_POST[pass]'";
        echo "<br>";
        $row = mysqli_fetch_array($query); 
        if(!empty($row['uname']) AND !empty($row['pword'])and secure()) 
        {  
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 

        } 
        else 
        { 
            echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
        }
        echo "end of function";
    }
    }
    echo "test";

    if(isset($_POST['submit'])){
        SignIn();
    }

    function secure()
    {
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
        if ($num>0)
        {
            return true;
        }
        else
        {
            return false;
        }
        echo "This returned back ". $num.  " rows";
    }
?>