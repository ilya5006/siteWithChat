<?
session_start();

if (empty($_SESSION['id_user'])) 
{
    header('Location: login.php');
}

require_once 'php/connection.php';
$administration_id = $_GET['id'];
$user_info = $_SESSION['user_info'];
$user_fio = explode(' ', $user_info[0]);
$user_info[0] = $user_fio[1].' '.$user_fio[2];
$event_id = $_GET['id'];

$query_event_info = "SELECT
                        events.name,
                        events.place,
                        events.date,
                        events.duration,
                        teachers.name,
                        teachers.id_teacher
                    FROM
                        `events`,
                        teachers
                    WHERE
                        teachers.id_teacher = events.id_teacher
                    AND
                        id_event = '$event_id'";
$result_event_info = mysqli_query($link, $query_event_info);
$data_event_info = mysqli_fetch_row($result_event_info);

$event_name = $data_event_info[0];
$event_place = $data_event_info[1];
$event_date = $data_event_info[2];
$event_duration = $data_event_info[3];
$event_teacher = $data_event_info[4];
$event_id_teacher = $data_event_info[5];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <? echo "<title> $event_name </title>"; ?>
    <link rel="stylesheet" href="styles/style_admin.css">
    <link rel="stylesheet" href="styles/contents/style_vneurochka_meropriyatia_profile.css">
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
                        <li> <a href="student_you.php"> Профиль </a> </li>
                        <li> <a href="schedule.php"> Расписание </a> </li>
                        <li> <a href="metodichka.php"> Методичка </a> </li>
                        <li> <a href="vneurochka.php" id="sb-menu_active"> Внеурочка </a> </li>
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
                    <li> <a href="vneurochka.php"> Курсы </a> </li>
                    <li> <a href="vneurochka_meropriyatia.php" id="nav-menu_active"> Мероприятия </a> </li>
                </ul>
            </div>
            <div id="content">
                <div id="profile">
                    <div class='p-background'>
                    <? echo "<h2 class='b-name'> $event_name </h2>"; ?>
                    </div>
                    <div class='info-background'>
                        <div class="item-info">
                            <p> Название мероприятия: </p>
                            <? echo "<p> $event_name </p>"; ?>
                            <hr>
                            <p> Место мероприятия: </p>
                            <? echo "<p> $event_place </p>"; ?>
                            <hr>
                            <p> Организатор: </p>
                            <? echo "<p> <a href='subject_teacher_profile.php?id=$event_id_teacher'> $event_teacher </a> </p>"; ?>
                            <hr>
                            <p> Дата мероприятия: </p>
                            <? echo "<p> $event_date </p>"; ?>
                            <hr>
                            <p> Длительность: </p>
                            <? echo "<p> $event_duration </p>"; ?>
                        </div>
                        <!-- <div class="item-opisanie">
                            <p> [фотографии с мероприятия, если оно уже было] </p>
                        </div>
                        <div class="items">
                            <p class=p-button> <a href="subject_teacher_profile.php"> Огранизатор мероприятия </a> </p>
                            <hr>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
