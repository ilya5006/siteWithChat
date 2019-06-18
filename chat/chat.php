<?
    require_once "../php/connection.php";
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/styleChat.css">
</head>
<body>
    <iframe src="messages.php">
    </iframe>
    
    <form action="send.php" method="POST">
        <input id="text" type="text" name="text" placeholder="Введите сообщение">
        <input id="send" type="submit"> 
    </form>    
</body>
</html>