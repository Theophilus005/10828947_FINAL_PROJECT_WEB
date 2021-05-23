<?php
include "databaseConnection.php";
session_start();

//Sign Up User
if(isset($_POST["username"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password1 = $_POST["pass1"];
    $password2 = $_POST["pass2"];

    //Validate
    if ($password1 == $password2) {
    $password = md5($password1);
    //Check if user already exists
    $check_user = "SELECT * FROM users WHERE email = '$email'";
    $check_user_result = $conn->query($check_user);
    if($check_user_result->num_rows == 0) {
        //Register User
        $register = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
        if($conn->query($register)) {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["status"] = "logged_in";
            echo "user registered";
        
        } else {
            echo $conn->error;
        }
    } else {
        echo "User is already registered";
    }

    } else {
        echo "wrong";
    }
 
}

//Sign In User
if(isset($_POST["email"]) && isset($_POST["pass3"])) {
    $email = $_POST["email"];
    $password = md5($_POST["pass3"]);
    
    //Check if user exists
    $check_user = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $check_user_result = $conn->query($check_user);
    if($check_user_result->num_rows > 0) {
        while($userData = $check_user_result->fetch_assoc()) {
            $username = $userData["username"];
        }
        
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["status"] = "logged_in";
        
       echo "success";
        
    } else {
        echo "Incorrect email/password";
    }
}


?>