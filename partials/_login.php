<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include '_connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1)
    {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['serial_no'] = $serial_no;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['serial_no'] = $row['serial_no'];
        header("Location: /iForum");
        // echo "Welcome ". $email;
    }
    else
    {
        header("Location: /iForum/index.php?loginsuccess=false");
        // echo "Log in fail.";
    }
}
?>