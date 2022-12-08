<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <title>iForum</title>
</head>

<body>
    <!-- Database Connection -->
    <?php
    include('partials/_connection.php');
    ?>

    <!-- Header -->
    <?php
    include('partials/_header.php');
    ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM threads WHERE thread_id=$id";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $description = $row['thread_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $comment = $_POST['comment'];

        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);

        $serial_no = $_POST['serial_no'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$serial_no', current_timestamp())";
        $result = mysqli_query($connection, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Your comment is posted successfully!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
    }
    ?>

<!-- Category container starts here -->
<!--  -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo "$title" ?></h1>
            <p class="lead"><?php echo "$description" ?></p>
            <hr class="my-4">
            <?php
            $serial_no = $_GET['threadid'];
            $sql = "SELECT * FROM `threads` WHERE thread_id = $serial_no";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $thread_user_id = $row['thread_user_id'];
                $sql2 = "SELECT name FROM `users` WHERE serial_no = $thread_user_id";
                $result2 = mysqli_query($connection, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '
            <p>Posted by : <strong>'.$row2['name'].'</strong></p>';
            }
            ?>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && isset($_SESSION['loggedin']) == true) {
        echo '
    <div class="container">
        <h1 class="py-2">Post a comment</h1>
        <form method="POST" action="' . $_SERVER['REQUEST_URI'] . '" class="mr-5 ml-5 px-5">
            <div class="form-group">
                <label for="description"><strong>Type Your Comment</strong></label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                <input type="hidden" name="serial_no" value="' . $_SESSION['serial_no'] . '">
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>';
    } else {
        echo '<div class="container">
        <h1 class="">Post a comment</h1>
        <div class="alert alert-danger" role="alert">
        <h4 class="mr-5 ml-5 my-3">You are not logged in! Login to post a comment.</h4>
      </div>
      </div>';
    }

    ?>

    <!-- Discussion container starts here -->
    <div class="container">
        <h1 class="py-2">Comments</h1>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($connection, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $time = $row['comment_time'];
            $comment_by = $row['comment_by'];
            $sql2 = "SELECT name FROM `users` WHERE serial_no=$comment_by";
            $result2 = mysqli_query($connection, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            echo  '<hr class="my-4">
        <div class="media my-3">
            <img src="img/default-user.png" width="64px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">' . $row2['name'] . ' at ' . $time . '</p>
                ' . $content . '
            </div>
        </div>';
        }
        if ($noResult) {
            echo
                '<div class="jumbotron jumbotron-fluid mr-5 ml-5">
            <div class="container">
              <h3 class="display-5">No comments here.</h3>
              <p class="lead">Be the first to post a comment.</p>
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