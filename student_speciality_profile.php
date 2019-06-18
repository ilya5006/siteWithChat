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

$speciality_id = $_GET['id'];

$query_speciality_info = "SELECT specialities.name, specialities.learnperiod FROM specialities WHERE id_speciality = '$speciality_id';";
$result_speciality_info = mysqli_query($link, $query_speciality_info);
$data_speciality_info = mysqli_fetch_row($result_speciality_info);

$speciality_name = $data_speciality_info[0];
$speciality_srok = $data_speciality_info[1];

$query_group_list  = "SELECT id_group, groups.name FROM `groups` WHERE id_speciality = '$speciality_id'";
$result_group_list = mysqli_query($link, $query_group_list);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <? echo "<title> $speciality_name </title>"; ?>
    <link rel="stylesheet" href="styles/style_admin.css">
    <link rel="stylesheet" href="styles/contents/style_student-speciality_profile.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|PT+Sans+Narrow|Roboto&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_adaptability.css">
    <link rel="stylesheet" href="styles/contents/style_profile.css">
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
                        <li> <a href="student_you.php" id="sb-menu_active"> Профиль </a> </li>
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
            <div id="nav-menu">
                <ul>
                    <li> <a href="student_you.php"> Вы </a> </li>
                    <li> <a href="student_group.php"> Группы </a> </li>
                    <li> <a href="student_specialty.php" id="nav-menu_active"> Специальности </a> </li>
                </ul>
            </div>
            <div id="content">
                <div id="profile">
                    <div class='p-background'>
                        <? echo "<h2 class='b-name'> $speciality_name </h2>"; ?>
                    </div>

                    <div class='info-background'>
                        <div class="item-info">
                            <p> Название: </p>
                            <? echo "<p> $speciality_name </p>" ?>
                            <hr>
                            <p> Кол-во часов: </p>
                            <? echo "<p> $speciality_srok </p>" ?>
                        </div>

                        <div class="items">
                            <form method="GET" action="student_group_profile.php">
                                <?
                                while ($data_group_list = mysqli_fetch_row($result_group_list))
                                {
                                    echo "
                                    <p class='text-p' style='width: 100%;'> $data_group_list[1] <input class='p-button' type='submit' name='id' value='$data_group_list[0]'> </p>";
                                    echo "<hr>";
                                }
                                ?>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>