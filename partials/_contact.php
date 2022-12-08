<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include '_connection.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql ="INSERT INTO `messages` (`name`, `email`, `phone`, `message`, `msg_time`) VALUES ('$name', '$email', '$phone', '$message', current_timestamp());";
    $result = mysqli_query($connection, $sql);
}
?>