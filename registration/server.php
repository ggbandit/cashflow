<?php
    session_start();
    $username = "";
    $email = "";
    $errors = array();

    $conn = mysqli_connect('localhost','root','chanpreecha1!','cashflow');

    if (isset($_POST['register'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        $sql = "SELECT username FROM users WHERE username='$username'";
        $result = $conn-> query($sql);
        $val = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if (!empty($val["username"])) {
            array_push($errors, "This username has been already used");
        } else if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO users (username, email, password) 
                    VALUES ('$username', '$email', '$password')"; 
            mysqli_query($conn, $sql);   
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: login.php');  
        }
        
    }

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: ../index.php');
            } else {
                array_push($errors, "wrong username/password combination");
            }
        }
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: ../cashflow/registration/login.php');
    }


?>