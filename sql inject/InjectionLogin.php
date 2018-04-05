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
        $row = mysqli_fetch_array($query); 
        if(!empty($row['uname']) AND !empty($row['pword'])) 
        { 
            $_SESSION['userName'] = $row['pass']; 
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 

        } 
        else 
        { 
            echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
        }
    }
    }

    if(isset($_POST['submit']))
    {
        SignIn();
    }

?>