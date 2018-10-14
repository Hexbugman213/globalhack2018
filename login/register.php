<?php
require_once('connect.php');
if (isset($_POST) & !empty($_POST)) {
    $fail = true;
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = hash ( "sha256", $_POST['password']);
    $sql = "INSERT INTO `login` (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    if($result and $fail) {
        echo "this registration was yeettastic";
    } else {
        echo "faile";
    }
}
?>
<html>
    <head>
        <title>test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

        <link rel="stylesheet" href="styles.css" >

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form class="form-signin" method="POST">
                <h2 class="form-signin-heading">Please Login</h2>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
        </div>
    </body>
</html>
