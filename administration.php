<?
session_start();

if (empty($_SESSION['id_user'])) 
{
    header('Location: login.php');
}

$administration_id = $_GET['id'];
$user_info = $_SESSION['user_info'];
$user_fio = explode(' ', $user_info[0]);
$user_info[0] = $user_fio[1].' '.$user_fio[2];

require_once 'php/connection.php';
$query_administration_list = "SELECT id_administration, administrations.name FROM administrations ";

if (isset($_GET['search-button'])) {
    if (isset($_GET['search-field'])) 
    {
        $search = $_GET['search-field'];
        $where = "WHERE administrations.name LIKE '%$search%'";
        $query_administration_list = $query_administration_list . $where;
        #echo $query_administration_list;
    }
}

$result_administration_list = mysqli_query($link, $query_administration_list);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Администрация </title>
    <link rel="stylesheet" href="styles/style_admin.css">
    <link rel="stylesheet" href="styles/contents/style_administration.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|PT+Sans+Narrow|Roboto&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_adaptability.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <div id="main-wrapper">
        <div id="wrapper-one">
            <div id="side-bar">
                <div class="hm-logo">
                    <h2> <a href="index.php"> ЩЕЛКОВСКИЙ <br> КОЛЛЕДЖ </a> </h2>
                </div>
                <div class="sb-profile">
                    <img src="images/avatar.jpg">
                    <? echo " <p class='sb-name'> $user_info[0] </p>"; ?>
                    <? echo "<p class='sb-role'> $user_info[1] </p>"; ?>
                </div>
                <div class="sb-menu">
                    <ul>
                        <li> <a href="administration.php" id="sb-menu_active"> Администрация </a> </li>
                        <li> <a href="subject.php"> Предметы </a> </li>
                        <li> <a href="student_you.php"> Профиль </a> </li>
                        <li> <a href="schedule.php"> Расписание </a> </li>
                        <li> <a href="metodichka.php"> Методичка </a> </li>
                        <li> <a href="vneurochka.php"> Внеурочка </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper-two">
            <div id="header-menu">
                <div class="hm-menu">
                    <ul>
                        <li> <a href="index.php"> Главная </a> </li>
                        <li> <a href="student_you.php" id="hm-menu_active"> Личный кабинет</a> </li>
                    </ul>
                </div>
                <div class="hm-login">
                    <a href="php/logout.php"> Выйти </a>
                </div>
            </div>
            <div id="content">
                
                <div class="items">
                    <form id="search-form" method="GET">
                        <div class="s-b">
                            <input id="enter" type="text" placeholder="Введите имя администрации." value="" name="search-field">
                            <input id="search" type="submit" value="ПОИСК" name="search-button">
                        </div>
                    </form>

                    <form method="GET" action="administration_pofile.php">
                        <?
                        while ($data_administration_list = mysqli_fetch_row($result_administration_list)) 
                        {
                            echo "<p class='text-p'> $data_administration_list[1] <input class='p-button' type='submit' name='id' value='$data_administration_list[0]'> </p>";
                            echo "<hr>";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?
    echo "
    <script>
        var searchInput = document.querySelector('#enter');
        searchInput.value = '$search';
    </script>
    ";
    ?>
</body>

</html>