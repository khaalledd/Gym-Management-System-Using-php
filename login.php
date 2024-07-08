<?php
// require('connect.php');
// if(isset($_POST["submit-login"])){
//     $query="SELECT * FROM `user_info` WHERE 'Email'='$_POST[Email]' AND 'pass'='$_POST[pass]'";
//     $result=mysqli_query($con,$query);
//                         if(mysqli_num_rows($result)==1){
//                             session_start();
//                             $_SESSION["Email"]=$_POST['$Email'] ;
//                             header("location:Couches.php")
//                         }else{
//                             echo"incorrect";
//                         }
//                     }

$status = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name=$_POST["name"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $message=$_POST["message"];
            if(empty($name) || empty($email) || empty($message)) {
                $status = "All fields are required.";
            } else {
                if(strlen($name) >= 50 || !preg_match("/^[a-zA-Z-'\s]+$/", $name)) {
                    $status = "Please enter a valid name";
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $status = "Please enter a valid email";
                } else {
            
                    $sql = "INSERT INTO user_info (name, phone, email, message) VALUES (:name, :phone, :email, :message)";
            
                    $stmt = $conn->prepare($sql);
                
                    $stmt->execute(['name' => $name, 'email' => $email,'phone' => $phone, 'message' => $message]);
            
                    $status = "Your message was sent";
                    $name = "";
                    $email = "";
                    $message = "";
                }
            }
            
            }
}