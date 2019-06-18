<?
session_start();

if (empty($_SESSION['id_user'])) 
{
    header('Location: login.php');
}

$tutorial_id = $_GET['id'];
$administration_id = $_GET['id'];
$user_info = $_SESSION['user_info'];
$user_fio = explode(' ', $user_info[0]);
$user_info[0] = $user_fio[1].' '.$user_fio[2];

require_once 'php/connection.php';

$query_tutorial_info = "SELECT	
                            tutorials.name,
                            tutorials.author,
                            tutorials.type,
                            tutorials.fileurl,
                            subjects.name,
                            tutorials.id_subject
                        FROM
                            tutorials,
                            subjects
                        WHERE
                            tutorials.id_subject = subjects.id_subject
                        AND
                            id_tutorial = '$tutorial_id'";
$result_tutorial_info = mysqli_query($link, $query_tutorial_info);
$data_tutorial_info = mysqli_fetch_row($result_tutorial_info);

$tutorial_name = $data_tutorial_info[0];
$tutorial_author = $data_tutorial_info[1];
$tutorial_type = $data_tutorial_info[2];
$tutorial_url = $data_tutorial_info[3];
$tutorial_subject = $data_tutorial_info[4];
$tutorial_id_subject = $data_tutorial_info[5];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <? echo "<title> $tutorial_name </title>"; ?>
    <link rel="stylesheet" href="styles/style_admin.css">
    <link rel="stylesheet" href="styles/contents/style_metodichka_profile.css">
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
                <div id="profile">
                    <div class='p-background'>
                    <? echo "<h2 class='b-name'> $tutorial_name </h2>"; ?>
                    </div>
                    <div class='info-background'>
                        <div class="item-info">
                            <p> Название: </p>
                            <? echo "<p> $tutorial_name </p>"; ?>
                            <hr>
                            <p> Автор: </p>
                            <? echo "<p> $tutorial_author </p>"; ?>
                            <hr>
                            <p> Тип: </p>
                            <? echo "<p> $tutorial_type </p>"; ?>
                            <hr>
                            <p> Предмет: </p>
                            <? echo "<p> <a href='subject_subject_profile.php?id=$tutorial_id_subject'> $tutorial_subject </a> </p>"; ?>
                            <hr>
                            <p> Ссылка: </p>
                            <? echo "<p> <a href='$tutorial_url'> [ссылка на скачку] </a> </p>"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
