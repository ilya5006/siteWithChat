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
$course_id = $_GET['id'];

$query_course_info = "SELECT 
                            courses.name, 
                            courses.duration, 
                            courses.price,
                            teachers.name,
                            teachers.id_teacher 
                        FROM 
                            courses,
                            teachers
                        WHERE
                            teachers.id_teacher = courses.id_teacher
                        AND
                            courses.id_course = '$course_id'";
$result_course_info = mysqli_query($link, $query_course_info);
$data_course_info = mysqli_fetch_row($result_course_info);

$course_name = $data_course_info[0];
$course_hours = $data_course_info[1];
$course_price = $data_course_info[2];
$course_teacher = $data_course_info[3];
$course_id_teacher = $data_course_info[4];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <? echo "<title> $course_name </title>"; ?>
    <link rel="stylesheet" href="styles/style_admin.css">
    <link rel="stylesheet" href="styles/contents/style_vneurochka_kurs_profile.css">
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
                    <li> <a href="vneurochka.php" id="nav-menu_active"> Курсы </a> </li>
                    <li> <a href="vneurochka_meropriyatia.php"> Мероприятия </a> </li>
                </ul>
            </div>
            <div id="content">
                <div id="profile">
                    <div class='p-background'>
                    <? echo "<h2 class='b-name'> $course_name </h2>"; ?>
                    </div>
                    <div class='info-background'>
                        <div class="item-info">
                            <p> Названин: </p>
                            <? echo "<p> $course_name </p>"; ?>
                            <hr>
                            <p> Ведёт курс: </p>
                            <? echo "<p> <a href='subject_teacher_profile.php?id=$course_id_teacher'> $course_teacher </a> </p>"; ?>
                            <hr>
                            <p> Цена: </p>
                            <? echo "<p> $course_price </p>"; ?>
                            <hr>
                            <p> Длительность: </p>
                            <? echo "<p> $course_hours </p>"; ?>
                        </div>
                        <!-- <div class="item-opisanie">
                            <p> Записавшись на нас курс по [название курса], вы научитесь [описание курса], [описание курса], [описание курса], а так же [описание курса]! <br> <br>
                            В ходе нашего курса вы научитесь: <br>
                            - [вот этому] <br>
                            - [этому] <br>
                            - [а еще этому] <br> <br>
                            Записывайтесь на курсы! </p>
                        </div>
                        <div class="items">
                            <p class=p-button> <a href="subject_teacher_profile.php"> Ведущий курса </a> </p>
                            <hr>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
