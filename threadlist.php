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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <title>iForum</title>
</head>

<body>
    <!-- Header -->
    <?php
    include('partials/_connection.php');
    include('partials/_header.php');
    ?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM categories WHERE category_id=$id";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $th_title = $_POST['title'];
        $th_desc = $_POST['description'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        $serial_no = $_POST['serial_no'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$serial_no', current_timestamp())";
        $result = mysqli_query($connection, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Your question has been added successfully!</strong>Get in touch to respond others.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
    }
    ?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron mr-4 ml-4">
            <h1 class="display-4"><?php echo "Welcome to $catname Forum" ?></h1>
            <p class="lead"><?php echo "$catdesc" ?></p>
            <hr class="my-4">
            <!-- <p>No Spam / Advertising / Self-promote in the forums.<br>
                Remain respectful of other members at all times.</p> -->
        </div>
    </div>

    <!-- /iForum/threadlist.php?catid='.$id.' -->
    <?php
    if (isset($_SESSION['loggedin']) && isset($_SESSION['loggedin']) == true) {
        echo
            '<div class="container">
    <h1 class="py-2">Ask a question</h1>
        <form method="POST" action="' . $_SERVER['REQUEST_URI'] . '" class="mr-5 ml-5 px-5">
            <div class="form-group">
                <label for="title">Question Title</label>
                <input type="text" class="form-control" id="text" name="title" aria-describedby="text" required>
            </div>
            <div class="form-group">
                <label for="description">Question Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <input type="hidden" name="serial_no" value="'.$_SESSION['serial_no'].'">
            <button type="submit" class="btn btn-primary">Ask now</button>
        </form>
    </div>';
    } else {
        echo '<div class="container">
        <h1 class="">Ask a question</h1>
        <div class="alert alert-danger" role="alert">
        <h4 class="mr-5 ml-5 my-3">You are not logged in! Login to ask a question.</h4>
      </div>
      </div>';
    }
    ?>


    <div class="container">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($connection, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $description = $row['thread_description'];
            $time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT name FROM `users` WHERE serial_no=$thread_user_id";
            $result2 = mysqli_query($connection, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            

            echo  '<hr class="my-4">
        <div class="media my-3">
            <img src="img/default-user.png" width="64px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">'.$row2['name'].' at ' . $time . '</p>
                <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
                ' . $description . '
            </div>
        </div>';
        }
        if ($noResult) {
            echo
                '<div class="jumbotron jumbotron-fluid mr-5 ml-5">
            <div class="container">
              <h3 class="display-5">There is no any questions.</h3>
              <p class="lead">Be the first to ask a question.</p>
            </div>
          </div>';
        }
        ?>
    </div>

    <!-- Footer -->
    <?php
    include('partials/_footer.php');
    ?>

</body>

</html>