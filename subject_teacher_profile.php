<?
session_start();

if (empty($_SESSION['id_user'])) 
{
    header('Location: login.php');
}

$teacher_id = $_GET['id'];
$administration_id = $_GET['id'];
$user_info = $_SESSION['user_info'];
$user_fio = explode(' ', $user_info[0]);
$user_info[0] = $user_fio[1].' '.$user_fio[2];

require_once 'php/connection.php';

$query_teacher_info = "SELECT
                            teachers.name,
                            teachers.birth,
                            teachers.email,
                            teachers.number,
                            roles.name,
                            classrooms.name
                        FROM
                            teachers,
                            classrooms,
                            roles
                        WHERE
                            teachers.id_role = roles.id_role
                        AND
                            teachers.id_classroom = classrooms.id_classroom
                        AND 
                            id_teacher = '$teacher_id'";

$result_teacher_info = mysqli_query($link, $query_teacher_info);
$data_teacher_info = mysqli_fetch_row($result_teacher_info);

$teacher_name = $data_teacher_info[0];
$teacher_birth = $data_teacher_info[1];
$teacher_email = $data_teacher_info[2];
$teacher_phone = $data_teacher_info[3];
$teacher_role = $data_teacher_info[4];
$teacher_classroom = $data_teacher_info[5];

$teacher_fi = explode(' ',  $teacher_name);
#$teacher_fi[1] = ИМЯ
#$teacher_fi[0] = ФАМИЛИЯ
#$teacher_fi[0] = ОЧЕСТВО
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <? echo "<title> $teacher_name </title>"; ?>
    <link rel="stylesheet" href="styles/style_admin.css">
    <link rel="stylesheet" href="styles/contents/style_subject_teacher_profile.css">
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
                    <li> <a href="subject.php"> Предметы </a> </li>
                    <li> <a href="subject_teacher.php" id="nav-menu_active"> Преподаватели </a> </li>
                </ul>
            </div>
            <div id="content">
                <div id="profile">
                    <img src="https://vignette.wikia.nocookie.net/bokunoheroacademia/images/9/94/Eraser.png/revision/latest?cb=20181002192225&path-prefix=pt-br">
                    <div class='p-background'>
                        <? echo "<h2 class='b-name'> $teacher_fi[1] $teacher_fi[2] </h2>"; ?>
                        <? echo "<p class='b-info'> $teacher_role </p>"; ?>
                    </div>
                    <div class='info-background'>
                        <div class="user-info">
                            <p> Имя преподавателя: </p>
                            <? echo "<p> $teacher_name </p>"; ?>
                            <hr>
                            <p> Дата рождения: </p>
                            <? echo "<p> $teacher_birth </p>"; ?>
                            <hr>
                            <p> Кабинет: </p>
                            <? echo "<p> $teacher_classroom </p>"; ?>
                        </div>
                        <div class="profile-info">
                            <p> Почта преподавателя: </p>
                            <? echo "<p> $teacher_email </p>"; ?>
                            <hr>
                            <p> Номер: </p>
                            <? echo "<p> $teacher_phone </p>"; ?>
                        </div>
                        <!-- <div class="items">
                            <p class=p-button> <a href="subject_subject_profile.php"> Предмет, который ведёт препод </a> </p>
                            <hr>
                            <p class=p-button> <a href="subject_subject_profile.php"> Предмет, который ведёт препод </a> </p>
                            <hr>
                            <p class=p-button> <a href="subject_subject_profile.php"> Предмет, который ведёт препод </a> </p>
                            <hr>
                            <p class=p-button> <a href="subject_subject_profile.php"> Предмет, который ведёт препод </a> </p>
                            <hr>
                            <p class=p-button> <a href="subject_subject_profile.php"> Предмет, который ведёт препод </a> </p>
                            <hr>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>