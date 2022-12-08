<?php
include('partials/_connection.php');
?>

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
    <!-- Header -->
    <?php
    include('partials/_header.php');
    ?>

<!-- sending data to db -->
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include 'partials/_connection.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql ="INSERT INTO `messages` (`name`, `email`, `phone`, `message`, `msg_time`) VALUES ('$name', '$email', '$phone', '$message', current_timestamp());";
    $result = mysqli_query($connection, $sql);
}

if (isset($_GET['send']) && $_GET['send'] == "true") {
    echo '<div class="alert alert-success alert-dismissible mr-5 ml-5 px-2 py-2 text-center" role="alert">
                <h3 class="alert-heading">Your message has been sent.</h3>
                    <h4>We will respond you within 3 hours.</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>';
}
?>

<div class="container my-2">
    <h1 class="py-2">Contact Us</h1>
        <form class="mr-5 ml-5 px-5" method="POST" action="contact.php?send=true">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Contact Number (Optional)</label>
                <input type="phone" name="phone" class="form-control" id="phone">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" id="message" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        <hr class="my-4">
    </div>

    <!-- Footer -->
    <?php
    include('partials/_footer.php');
    ?>

</body>

</html>