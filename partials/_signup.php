<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <title>iForum</title>
</head>

<body>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $showError = false;
    include '_connection.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Check email exists
    $existSql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($connection, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0)
    {
        $showError = true;
        header("Location: /iForum/index.php?signupsuccess=false");
    }
    else
    {
        $sql = "INSERT INTO `users` (`name`, `email`, `password`, `timestamp`) VALUES('$name', '$email', '$password', current_timestamp());";
        $result = mysqli_query($connection, $sql);
        if($result)
        {
            $showAlert = true;
            header("Location: /iForum/index.php?signupsuccess=true");
        }
    }
}

?>

</body>
</html>