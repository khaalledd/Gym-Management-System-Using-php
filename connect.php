<?php
        //Database Connection
    // $dsn= 'mysql:host=localhost; dbname=gym';   // data source name
    // $user = 'root';                            // the user to connect
    // $pass = '';                                // password of user

    // try {
    // $conn = new PDO($dsn,$user, $pass);    // start a new connection with PDO class
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    // //echo "Connected successfully";
    // } catch(PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    // }
    $dsn= 'mysql:host=localhost; dbname=gym';   // data source name
    $user = 'root';                            // the user to connect
    $pass = '';                                // password of user

    try {
    $conn = new PDO($dsn,$user, $pass);    // start a new connection with PDO class
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    //echo "Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
    // // include('connection.php');
//     $sname= "localhost";
//     $uname= "root";
//     $password = "";
//     $db_name = "gym";

//     $conn =new mysqli($sname, $uname, $password, $db_name);

// if ($conn->connect_error) {
// 	die ("Connection failed!".$conn->connect_error);
// }
    

?>