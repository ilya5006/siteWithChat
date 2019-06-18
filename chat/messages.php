<?
    require_once "../php/connection.php";
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styleMessages.css">
</head>
<body>
    <?
        $query = "SELECT * FROM messagesall";
        $result = mysqli_query($link, $query);

        while ($info = mysqli_fetch_row($result)) //id text user role date
        {
            echo "<div id='message'>";
                echo "<div id='nameAndDate'>";
                    echo "<p id='name'> $info[2] </p>";
                    echo "<p id='date'> $info[4] </p>";
                echo "</div>";

                echo "<p id='messageText'> $info[1] </p>";
            echo "</div>";
        }
    ?>
</body>
</html>