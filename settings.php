<?php
session_start();
require_once('connect.php');
$user = $_SESSION['username'];
$data = [];
function update_row() {
    global $user, $connection, $data;
    $sql = "SELECT * FROM `login` WHERE username='$user'"; //from the table where the username is the logged in one
    $result = mysqli_query($connection, $sql); //send command
    $row = mysqli_fetch_row($result)[4]; //gets 4th row (userdata)
    if ($row !== 'false') {
        $data = explode(" ", $row);
    } else {
        $data = 'false';
    }
}
if (!isset($_SESSION['username'])) { //if there isn't a session
    header('location: login.php'); //redirect to login
} else { //if there is
    update_row();
}
function update_data($data) {
    global $user, $connection; //hey, use these vars
    $sql = "UPDATE `login` SET userdata='$data' WHERE username='$user'"; //command to update data
    mysqli_query($connection, $sql); //sends command
}
if (isset($_POST) & !empty($_POST)) { //if data submitted
    $implode = implode(" ", $_POST);
    update_data($implode);
    update_row();
    $smsg = "Changes Saved!";
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
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                $('.geox').attr("value", 0);
                $('.geoy').attr("value", 0);
            }
        }
        function showPosition(position) {
            $('.geox').attr("value", position.coords.latitude);
            $('.geoy').attr("value", position.coords.longitude);
        }
        getLocation()
    </script>
</head>
<body>
<div class="container">
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg ?> </div><?php } ?>
    <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg ?> </div><?php } ?>
    <form class="form form-signin form-settings" method="POST">
        <?php if($data !== "false") {?>
        <a class="btn btn-lg btn-primary btn-block back" href="home.php">Back</a>
        <h2 class="form-signin-heading">Settings for <?php echo $user; ?></h2><?php } else {?>
        <h2 class="form-signin-heading">More info for <?php echo $user; }?>
        <h5>First Name</h5>
        <input type="text" value="<?php if($data !== "false") {echo $data[0];} ?>" name="fname" class="form-control" placeholder="First Name" required>
        <h5>First Name</h5>
        <input type="text" value="<?php if($data !== "false") {echo $data[1];} ;?>" name="lname" class="form-control" placeholder="Last Name" required>
        <h5>Is English your first language?</h5>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary <?php if ($data[2] == "on") {echo "active";}?>">
                <input type="radio" name="options" id="option1" autocomplete="off" value="on" required <?php if ($data[2] == "on") {echo "checked";}?>> Yes
            </label>
            <label class="btn btn-primary <?php if ($data[2] == "off") {echo "active";}?>">
                <input type="radio" name="options" id="option2" autocomplete="off" value="off" <?php if ($data[2] == "off") {echo "checked";}?>> No
            </label>
        </div>
        <h5>Location</h5>
        <div class="input-group">
            <input type="text" class="form-control geox" placeholder="latitude" name="latitude" required/>
            <input type="text" class="form-control geoy" placeholder="longitude" name="longitude" required/>
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit">Save Changes</button>
        <br>
        <div class="container">
            <a class="btn btn-lg btn-primary btn-block logout" href="logout.php">Logout</a>
        </div>
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
