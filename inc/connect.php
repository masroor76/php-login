<?php
    $HOSTNAME='localhost';
    $USERNAME='root';
    $PASSWORD='';
    $DATABASE='sms';

    $con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
    if(!$con){
        // echo 'Connection Unsuccessful';
        die(mysqli_error($con));
    }
?>