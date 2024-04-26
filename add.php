<?php
// DATABASE CONNECTION
include("config.php");
session_start();

if(isset($_POST['submit'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $currentDate = date("Y-m-d");

        // INSERT THE DATA FROM NOTE.PHP TO NOTESS TABLE
        $add = "INSERT INTO `notess` (title, content, currentDate, user_id) VALUES ('$title', '$content', '$currentDate', '$user_id')";
        $query_run = mysqli_query($conn, $add);

        // CHECK IF THERE WAS AN ERROR
        if($query_run) {
            header("Location: note.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
