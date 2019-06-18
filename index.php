<?
session_start();

if (isset($_SESSION['id_user'])) 
{
?>
    <script async>
        document.addEventListener("DOMContentLoaded", function() 
        {
            console.log('Вы войденны');

            var auth_button = document.querySelector('#auth-button');
            auth_button.textContent = 'Выйти';

            auth_button.href = 'php/logout.php';
        });
    </script>
<?
} 
else 
{
?>
    <script>
        console.log('Вы не авторизованны!');
    </script>
<?
}

require_once 'php/connection.php';
$query_news_list = "SELECT id_news, title, textmin,`date`, imageurl FROM news ";

if (isset($_GET['search-button'])) {
    if (isset($_GET['search-field'])) 
    {
        $search = $_GET['search-field'];
        $where = "WHERE title LIKE '%$search%'";
        $query_news_list = $query_news_list . $where;
        #echo $query_news_list;
    }
}

$result_news_list = mysqli_query($link, $query_news_list);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Новости </title>
    <link rel="stylesheet" href="styles/style_index.css">
    <link rel="stylesheet" href="styles/contents/style_news.css">
    <link rel="stylesheet" href="styles/chat.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|PT+Sans+Narrow|Roboto&amp;subset=cyrillic" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

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
                <form>
                    <input name="search-field" type="text" placeholder="ИЩИ" id="ishi-pole">
                    <input id="ishi" type="submit" value=" " name="search-button">
                </form>
            </ul>
        </div>
        <div id="content">
            <div id="news">
                <form method="GET" action="index_news.php">
                <?
                    while ($data_news_list = mysqli_fetch_row($result_news_list))
                    {
                        echo "<div class='news_block'>";
                        echo "<p class='news-date'> $data_news_list[3] </p>";
                        echo "<h2 class='c-h'> $data_news_list[1] </h2>";
                        echo "<p class='c-text'> 
                                    <img src='$data_news_list[4]'>
                                $data_news_list[2]
                                </p>";
                            
                            
                                echo "<p class='p-link'> Подробнее... <input class='input-link' type='submit' name='id' value='$data_news_list[0]'> </p>";
                        echo "</div>";
                    }
                ?>
                </form>
            </div>

            <?
            if (isset($_SESSION['id_user']))
            {
            ?>
            <iframe src="chat/chat.php">
            <?
            }
            ?>
        </div>
    </div>
    <?
    echo "
    <script>
        var searchInput = document.querySelector('#ishi-pole');
        searchInput.value = '$search';
    </script>
    ";
    ?>
</body>

</html>