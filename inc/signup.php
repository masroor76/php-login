<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:../home.php');
}
?>

<?php
$userno = 0;
$failed = 0;
$succeed = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $name = $_POST['name'];
    $standard = $_POST['standard'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "Select * from `students` where username='$username'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $userno = 1;
        } else {
            $sql = "insert into `students`(name,standard,username,password) values('$name','$standard','$username','$password')";
            $result1 = mysqli_query($con, $sql);
            if (!$result1) {
                $failed = 1;
            } else {
                $succeed = 1;
            }
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

    <title>Sign Up</title>
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
                <h2 style="display:flex; align-items: center; justify-content: center;">Sign Up</h2>
            </div>
            <div>
                <form action="signup.php" method="POST">
                    <div style="margin-top: 10px;">
                        <div>
                            <label style="font-size:large; font-weight:bold; border-radius:3px;">Name:</label>
                        </div>
                        <div>
                            <input placeholder="Enter Your Name" style=" width:300px; display:flex; align-items: center; justify-content: center; border:1px solid #555000; font-size:large; border-radius:3px;" type="text" required name="name"></input>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <div>
                            <label style="font-size:large; border-radius:3px; font-weight:bold; ">Standard:</label>
                        </div>
                        <div>
                            <input placeholder="Enter Your Class" style="width:300px; display:flex; align-items: center; justify-content: center; border:1px solid #555000; font-size:large; border-radius:3px;" type="number" required name="standard"></input>

                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <div>
                            <label style="font-size:large; border-radius:3px; font-weight:bold;">UserName:</label>
                        </div>
                        <div>
                            <input style=" width:300px; display:flex; align-items: center; justify-content: center; border:1px solid #555000; font-size:large; border-radius:3px;" placeholder="Enter Your UserName" type="text" required name="username"></input>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <div>
                            <label style="font-size:large; border-radius:3px; font-weight:bold;">Password:</label>
                        </div>
                        <div>
                            <input placeholder="Enter Your Password" style=" width:300px; display:flex; align-items: center; justify-content: center; border:1px solid #555000; font-size:large; border-radius:3px;" type="password" required name="password"></input>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <button style="background-color:#454545; color:white; border:none; height:30px; width: 306px; display:flex; align-items: center; justify-content: center; font-size:large; border-radius:3px;" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div style="margin: 0px; display:flex; justify-content:center;">
                <p><a href="login.php" style=" color: #000000; font-size:15px;">Do you have an account, Login Now!</a></p>
            </div>
            <div style="margin: 0px; display:flex; justify-content:center;">
                <p>
                    <?php
                    if ($userno === 1) {
                        echo "User already exit";
                    }
                    ?>
                    <?php
                    if ($failed === 1) {
                        echo "Sorry, Data innsertion Failed";
                    }
                    ?>
                    <?php
                    if ($succeed === 1) {
                        echo "You have been successfully registered.";
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</body>

</html>