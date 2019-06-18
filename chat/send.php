<?
    require_once "../php/connection.php";
    session_start();

    $text = $_POST["text"];
    $text = htmlentities(mysqli_real_escape_string($link, $text));
    $date = date("Y-m-d");
    $userName = $_SESSION['user_info'][0];
    $userRole = $_SESSION['user_info'][1];

    $query = "INSERT INTO messagesall VALUES (NULL, '$text', '$userName', '$userRole', '$date')";
    mysqli_query($link, $query);

    header("Location: chat.php");
?>