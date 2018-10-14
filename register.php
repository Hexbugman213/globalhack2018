<?php
require_once('connect.php');
if (isset($_POST) & !empty($_POST)) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = hash ( "sha256", $_POST['password']);
    $sql = "INSERT INTO `login` (username, email, password, userdata, layout) VALUES ('$username', '$email', '$password', 'false', '0 1 2 3 4 5 6 7')";
    $result = mysqli_query($connection, $sql);
    if($result) {
        $smsg =  "User Registered! Click \"Login\" to login.";
    } else {
        $fmsg = "Registration Unsuccesfull.";
    }
}
?>
<html>
    <head>
        <title>test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles.css" >
    </head>
    <body>
        <div class="container">
            <br>
            <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg ?> </div><?php } ?>
            <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg ?> </div><?php } ?>
            <form class="form-signin" method="POST">
                <h2 class="form-signin-heading">Registration</h2>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
        </div>
        <div id="google_translate_element"></div>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>
