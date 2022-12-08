<?php
// error_reporting(0);
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/iForum">iForum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/iForum">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Top Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                $sql = "SELECT category_id, category_name FROM `categories` LIMIT 5";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                echo '<a class="dropdown-item" href="/iForum/threadlist.php?catid='.$category_id.'">'.$category_name.'</a>';
                }

            echo 
            '</div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rules.php">Forum Rules</a>
            </li>
        </ul>
        <div class="row mx-2">';
        if(isset($_SESSION['loggedin']) && isset($_SESSION['loggedin'])==true)
        {
            echo '
            <!-- <form class="form-inline my-2 my-lg-0" method="GET" action="search.php">
             <input class="form-control mr-sm-5" name="query" type="search" placeholder="Search" aria-label="Search"> -->
            
           <h5 class="text-light mx-0 my-0"> Welcome&nbsp;<strong> '. $_SESSION['name'].'</strong> </h5>
           &nbsp;&nbsp;
           <a role="button" href="partials/_logout.php" class="btn btn-primary mx-1">Logout</a>
            </form>';
        }
        else
        {
            echo '
            <!-- <form class="form-inline my-2 my-lg-0" method="GET" action="search.php">
             <input class="form-control mr-sm-5" name="query" type="search" placeholder="Search" aria-label="Search">
            <input class="btn btn-outline-dark btn-primary mr-sm-5 my-2 my-sm-0" type="submit">Search</input> -->

            <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#loginModal">Login</button>
            <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#signupModal">Signup</button>
        </form>';
        }
        echo 
    '</div>
    </div>
</nav>';

include('partials/_loginModal.php');
include('partials/_signupModal.php');

// SignUp Condition
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible mr-5 ml-5 px-2 py-2 text-center" role="alert">
                <h3 class="alert-heading">Thank you for joining us.</h3>
                    <h4>Now you can login.</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>';
} 
else
{
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false")
    {
        echo '<div class="alert alert-danger alert-dismissible mr-5 ml-5 px-2 py-2 text-center" role="alert">
                <h3 class="alert-heading">SignUp Failed! Email already exists.</h3>
                    <h4>Use another email or try to login with same email.</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>';
    }
}

// Login Condition
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false")
    {
        echo '<div class="alert alert-danger alert-dismissible mr-5 ml-5 px-2 py-2 text-center" role="alert">
                <h3 class="alert-heading">Login Failed! Email or Password do not match.</h3>
                    <h4>Please enter valid email and password.</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>';
    }
