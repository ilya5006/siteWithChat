<?
session_start();

if (empty($_SESSION['id_user']) or empty($_GET['id'])) 
{
    header('Location: login.php');
}

$subject_id = $_GET['id'];
$administration_id = $_GET['id'];
$user_info = $_SESSION['user_info'];
$user_fio = explode(' ', $user_info[0]);
$user_info[0] = $user_fio[1].' '.$user_fio[2];

require_once 'php/connection.php';
$query_subject_info = "SELECT
                            subjects.name,
                            specialities.name,
                            specialities.id_speciality,
                            teachers.name,
                            teachers.id_teacher
                        FROM
                            subjects,
                            specialities,
                            teachers
                        WHERE
                            subjects.id_speciality = specialities.id_speciality
                        AND
                            subjects.id_teacher = teachers.id_teacher
                        AND
                            id_subject = '$subject_id'";

$result_subject_info = mysqli_query($link, $query_subject_info);
$data_subject_info = mysqli_fetch_row($result_subject_info);

$subject_name = $data_subject_info[0];
$subject_speciality = $data_subject_info[1];
$subject_id_speciality = $data_subject_info[2];
$subject_teacher = $data_subject_info[3];
$subject_id_teacher = $data_subject_info[4];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <? echo "<title> $subject_name </title>"; ?>
    <link rel="stylesheet" href="styles/style_admin.css">
    <link rel="stylesheet" href="styles/contents/style_subject_subject_profile.css">
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
                        <li> <a href="subject.php" id="sb-menu_active"> Предметы </a> </li>
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
            <div id="nav-menu">
                <ul>
                    <li> <a href="subject.php" id="nav-menu_active"> Предметы </a> </li>
                    <li> <a href="subject_teacher.php"> Преподаватели </a> </li>
                </ul>
            </div>
            <div id="content">
                <div id="profile">
                    <div class='p-background'>
                        <? echo "<h2 class='b-name'> $subject_name </h2>"; ?>
                    </div>
                    <div class='info-background'>
                        <div class="item-info">
                            <p> Название предмета: </p>
                            <? echo "<p> $subject_name </p>"; ?>
                            <hr>
                            <p> Специальность: </p>
                            <? echo "<p> <a href='student_speciality_profile.php?id=$subject_id_speciality'> $subject_speciality </a> </p>"; ?>
                            <hr>
                            <p> Учитель: </p>
                            <? echo "<p> <a href='subject_teacher_profile.php?id=$subject_id_teacher'> $subject_teacher </a> </p>"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>