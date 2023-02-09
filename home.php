<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:inc/login.php');
} else {
    $uname = $_SESSION['username'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body style="
margin: 0;
display:flex;
justify-content: center;
background-color: #f43f66;
">
    <div style="
    margin-top:100px;
    background-color: #fff;
    display:flex;
    align-self: center;
    align-items: center;
    justify-content: center;
    height:450px;
    width:450px;
    border-radius:10px;
    ">
        <div>
        <div>
                <h2 style="display:flex; align-items: center; justify-content: center;">Home Page</h2>
            </div>
            <div style="height:300px; display:flex; align-items: center; justify-content: center;">
                <h3>Welcome
                    <?php echo $_SESSION['username']; ?>.
                </h3>
            </div>
            <div style="margin-top: 10px;">
                <a href="inc/logout.php" style="background-color:#454545; color:white; border:none; height:30px; width: 306px; display:flex; align-items: center; justify-content: center; font-size:large; border-radius:3px;">Logout</a>
            </div>
        </div>

    </div>
</body>

</html>