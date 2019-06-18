<?
session_start();

if (isset($_SESSION['id_user'])) 
{
?>
    <script async>
        document.addEventListener("DOMContentLoaded", function() {
            console.log('Вы войденны');

            var auth_button = document.querySelector('#auth-button');
            auth_button.textContent = 'Выйти';

            auth_button.href = 'php/logout.php';
        });
    </script>
<?
} 
else {
?>
    <script>
        console.log('Вы не авторизованны!');
    </script>
<?
}

$news_id = $_GET['id'];

require_once 'php/connection.php';
$query_news_info = "SELECT title, textmin, textfull,`date`,imageurl FROM news WHERE id_news = '$news_id'";
$result_news_info = mysqli_query($link, $query_news_info);
$data_news_info = mysqli_fetch_row($result_news_info);

$news_title = $data_news_info[0];
$news_mintext = $data_news_info[1];
$news_fulltext = $data_news_info[2];
$news_date = $data_news_info[3];
$news_image = $data_news_info[4];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <? echo "<title> $news_title </title>"; ?>
    <link rel="stylesheet" href="styles/style_index.css">
    <link rel="stylesheet" href="styles/contents/style_news.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|PT+Sans+Narrow|Roboto&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_login.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<style>
    #news .с-link 
    {
        top: 0;
        height: 50px;
    }

    #news .с-link a 
    {
        margin: 0 0 15px 15px;
    }

    #news .с-link a:hover 
    {
        margin: 0 0 15px 15px;
    }
</style>

<body>
    <div id="main-wrapper">
        <div id="header-menu">
            <div class="hm-logo">
                <h2> <a href="index.php"> ЩЕЛКОВСКИЙ КОЛЛЕДЖ </a> </h2>
            </div>
            <div class="hm-menu">
                <ul>
                    <li> <a href="index.php" id="hm-menu_active"> Главная </a> </li>
                    <li> <a href="student_you.php"> Личный кабинет</a> </li>
                </ul>
            </div>
            <div class="hm-login">
                <a href="login.php" id="auth-button"> Войти </a>
            </div>
        </div>
        <div id="header-picture">
        </div>
        <div id="nav-menu">
            <ul>
                <li> <a href="index.php" id="nav-menu_active"> Новости </a> </li>
                <li> <a href="vneurochka_meropriyatia.php"> Мероприятия</a> </li>
                <li> <a href="schedule.php"> Расписание </a> </li>
            </ul>
        </div>
        <div id="content">
            <div id="news">
                <div class="news_block">
                    <? echo"<h2 class='c-h'> $news_title </h2>"; ?>
                    <? echo"<p class='c-text'> <img src='$news_image'>
                        $news_mintext
                    </p>"; ?>
                    <? echo "<p class='c-text'> $news_fulltext </p>"; ?>
                    <? echo " <p class='с-link'> <a href='index.php'> Вернуться назад </a> </p>"; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>