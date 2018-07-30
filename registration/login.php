<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
        <div class="box">
            <h2>Login</h2>
            <form method="post" action="login.php">
                <!-- display validation errors here -->
                <?php include('errors.php'); ?>
                <div class="inputBox">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                </div>
                <div>
                    <input type="submit" name="login" value="Login">
                </div>
                <div class="mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="register.php">Sign up</a></li>
                        <li class="breadcrumb-item"><a href="#">Forget password</a></li>
                    </ol>
                </nav>
                </div>
            </form>
        </div>
</body>
</html>