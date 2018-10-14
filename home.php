<?php
session_start();
require_once('connect.php');
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) { //if there isn't a session
    header('location: login.php'); //redirect to login
} else { //if there is
    $sql = "SELECT * FROM `login` WHERE username='$user'"; //from the table where the username is the logged in one
    $result = mysqli_query($connection, $sql); //send command
    $row = mysqli_fetch_row($result)[3]; //gets 4th row (userdata)
    $row = mysqli_fetch_row($result)[4]; //gets 5th row (layout)
}
function update_layout($layout) {
    global $user, $connection; //hey, use these vars
    $sql = "UPDATE `login` SET layout='$layout' WHERE username='$user'"; //command to update data
    mysqli_query($connection, $sql); //sends command
}
if (isset($_POST) & !empty($_POST)) { //if data submitted
    $implode = implode(" ", $_POST["var"]);
    update_layout($implode);
}
?>
<html lang="en">
<head>
    <title>Home - <?php echo $user ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index test</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css" >
</head>
<body>
<div class="container">
    <div class="grid">

        <div class="item" data-id="1">

            <div class="item-content shake-item">
                <!--<button type="button" class="close" aria-label="Close" onclick=closeElem(this)>
                    <span aria-hidden="true">&times;</span>
                </button>-->
                1!
            </div>
        </div>

        <div class="item" data-id="2">
            <div class="item-content shake-item">
                <!--<button type="button" class="close" aria-label="Close" onclick=closeElem(this)>
                    <span aria-hidden="true">&times;</span>
                </button>-->
                <div class="my-custom-content">
                    2!
                </div>
            </div>
        </div>
        <div class="item" data-id="3">
            <div class="item-content shake-item">
                <!--<button type="button" class="close" aria-label="Close" onclick=closeElem(this)>
                    <span aria-hidden="true">&times;</span>
                </button>-->
                <div class="my-custom-content">
                    3!
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="edit-btn"><button onclick="toggleEdit()" class="btn btn-primary">Edit</button></div>
    <form action="" method="POST" class="hidden save-btn" id="submit" onsubmit="submitOrder()">
        <input type="hidden" name="var" id="hiddenboi" value="" />
        <button type="submit" class="btn btn-success">Save Changes</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.3.1/web-animations.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
<script src="https://unpkg.com/muuri@0.6.3/dist/muuri.min.js"></script>
<script src="script.js"></script>
</html>
