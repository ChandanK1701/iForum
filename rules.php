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

    <div class="container my-4">
        <div class="jumbotron ml-4 mr-4">
            <h3 class="display-4">Forum Rules</h3>
            <hr class="my-4">
            <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> -->
            <ol>
                <h3>
                <li>
                    No Spam / Advertising / Self-promote in the forums
                </li>
                <br>
                <li>
                    Do not post copyright-infringing material
                </li>
                <br>
                <li>
                    Do not post “offensive” posts, links or images
                </li>
                <br>
                <li>
                    Do not cross post questions
                </li>
                <br>
                <li>
                    Remain respectful of other members at all times
                </li>
                </h3>
            </ol>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include('partials/_footer.php');
    ?>

</body>

</html>