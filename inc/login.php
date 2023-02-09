<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:../home.php');
}
?>

<?php
$wrong = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "Select * from `students` where username='$username' and password='$password'";
    // $sql = "Select * from `students` where username='$username' and password='$password'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            session_start();
            $_SESSION['username'] = $username;
            header('location:../home.php');
        } else {
            $wrong = 1;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body style="
margin: 0;
display:flex;
justify-content: center;
background-color: #f43f66;
">
    <div style="
    margin-top:120px;
    background-color: #fff;
    display:flex;
    align-self: center;
    align-items: center;
    justify-content: center;
    height:400px;
    width:400px;
    border-radius:10px;
    ">
        <div>
            <div>
                <h2 style="display:flex; align-items: center; justify-content: center;">Login</h2>
            </div>
            <div style="margin-top: 20px;">
                <form action="login.php" method="POST">
                    <div style="margin-top: 10px;">
                        <div>
                            <label style="font-size:large; font-weight:bold; border-radius:3px;">UserName:</label>
                        </div>
                        <div>
                            <input style=" width:300px; display:flex; align-items: center; justify-content: center; border:1px solid #555000; font-size:large; border-radius:3px;" placeholder="Enter Your UserName" type="text" required name="username"></input>
                        </div>
                    </div>
                    <div style="margin-top: 10px;">
                        <div>
                            <label style="font-size:large; font-weight:bold; border-radius:3px;">Password:</label>
                        </div>
                        <div>
                            <input style=" width:300px; display:flex; align-items: center; justify-content: center; border:1px solid #555000; font-size:large; border-radius:3px;" placeholder="Enter Your Password" type="password" required name="password"></input>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <button style="background-color:#454545; color:white; border:none; height:30px; width: 306px; display:flex; align-items: center; justify-content: center; font-size:large; border-radius:3px;" type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div style="margin: 0px; display:flex; justify-content:center;">
                <p><a href="signup.php" style=" color: #000000; font-size:15px;">Don't have account, SignUp Now!</a></p>
            </div>
            <div style="margin: 0px; display:flex; justify-content:center;">
                <p>
                    <?php
                    if ($wrong === 1) {
                        echo "Username or Password doesn't match!";
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>

</body>

</html>