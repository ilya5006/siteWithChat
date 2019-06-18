<?
session_start();

if (empty($_SESSION['id_user'])) {
    header('Location: login.php');
}

$administration_id = $_GET['id'];
$user_info = $_SESSION['user_info'];
$user_fio = explode(' ', $user_info[0]);
$user_info[0] = $user_fio[1].' '.$user_fio[2];

require_once 'php/connection.php';

$query_tutorial_list = "SELECT tutorials.id_tutorial, tutorials.name FROM tutorials ";

if (isset($_GET['search-button'])) 
{
    if (isset($_GET['search-field'])) {
        $search = $_GET['search-field'];
        $where = "WHERE tutorials.name LIKE '%$search%'";
        $query_tutorial_list = $query_tutorial_list . $where;
        #echo $query_group_list;
    }
}

$result_tutorial_list = mysqli_query($link, $query_tutorial_list);

$query_group_list  = "SELECT id_group, groups.name FROM `groups` ";



$result_group_list = mysqli_query($link, $query_group_list);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Методички </title>
    <link rel="stylesheet" href="styles/style_admin.css">
    <link rel="stylesheet" href="styles/contents/style_metodichka.css">
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
                        <li> <a href="administration.php"> Администрация </a> </li>
                        <li> <a href="subject.php"> Предметы </a> </li>
                        <li> <a href="student_you.php"> Профиль </a> </li>
                        <li> <a href="schedule.php"> Расписание </a> </li>
                        <li> <a href="metodichka.php" id="sb-menu_active"> Методичка </a> </li>
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

                <div class="items" style="width: 100%;">
                    <form id="search-form" method="GET">
                        <div class="s-b">
                            <input id="enter" type="text" placeholder="Введите имя администрации." value="" name="search-field">
                            <input id="search" type="submit" value="ПОИСК" name="search-button">
                        </div>
                    </form>
                </div>
                
                <div class="items" style="width: 100%;">
                    <form method="GET" action="metodichka_profile.php">
                            <?
                            while ($data_tutorial_list = mysqli_fetch_row($result_tutorial_list)) 
                            {
                                echo "<p class='text-p'> $data_tutorial_list[1] <input class='p-button' type='submit' name='id' value='$data_tutorial_list[0]'> </p>";
                                echo "<hr>";
                            }
                            ?>
                        </form>
                 </div>

                <!--
                <div class="is-search">
                    <form id="search-form" method="GET">
                        <div class="s-b">
                            <input id="enter" type="text" placeholder="Введите группу." value="" name="search-field">
                            <input id="search" type="submit" value="!" name="search-button">
                        </div>
                    </form>

                    <form method="GET" action="schedule.php">
                        <?
                        while ($data_group_list = mysqli_fetch_row($result_group_list)) 
                        {
                            echo "<p class='text-p-sleva'> $data_group_list[1] <input class='p-button-sleva' type='submit' name='id' value='$data_group_list[0]'> </p>";
                            echo "<hr>";
                        }
                        ?>
                    </form> -->
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