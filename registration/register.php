<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
        <div class="box">
            <h2>Register</h2>
            <form method="post" action="register.php">
                <!-- display validation errors here -->
                <?php include('errors.php'); ?>

                <div class="inputBox">
                    <input type="text" name="username" required="" value="<?php echo $username?>">
                    <label>Username</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" required="" value="<?php echo $email?>">
                    <label>Email</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password_1" required="">
                    <label>Password</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password_2" required="">
                    <label>Confirm Password</label>
                </div>
                <div>
                    <input type="submit" name="register" value="Register">
                </div>
                <div class="mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="login.php">Sign in</a></li>
                        <li class="breadcrumb-item"><a href="#">Forget password</a></li>
                    </ol>
                </nav>
                </div>
            </form>
        </div>
</body>
</html>