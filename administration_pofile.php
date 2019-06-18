<?
session_start();

if (empty($_SESSION['id_user']) or empty($_GET['id'])) 
{
    header('Location: login.php');
}

$administration_id = $_GET['id'];
$user_info = $_SESSION['user_info'];
$user_fio = explode(' ', $user_info[0]);
$user_info[0] = $user_fio[1].' '.$user_fio[2];

require_once 'php/connection.php';
$query_administration_info = "SELECT
                                administrations.name,
                                administrations.birth,
                                administrations.email,
                                administrations.number,
                                roles.name,
                                classrooms.name
                            FROM
                                administrations,
                                classrooms,
                                roles
                            WHERE
                                administrations.id_role = roles.id_role
                            AND
                                administrations.id_classroom = classrooms.id_classroom
                            AND 
                                id_administration = '$administration_id';";

$result_administration_info = mysqli_query($link, $query_administration_info);
$data_administration_info = mysqli_fetch_row($result_administration_info);

$admin_name = $data_administration_info[0];
$admin_birth = $data_administration_info[1];
$admin_email = $data_administration_info[2];
$admin_phone = $data_administration_info[3];
$admin_role = $data_administration_info[4];
$admin_classroom = $data_administration_info[5];

$admin_fi = explode(' ', $admin_name);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <? echo "<title> $admin_fi[0] $admin_fi[2] </title>"; ?>
    <link rel="stylesheet" href="styles/style_admin.css">
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
                <div id="profile">
                    <img src="https://konata.namikoi.com/characters/5f245464-91c4-4597-b7a2-f4e5397740fa/b88e507d-9053-44b4-8198-aa1961eca6c0.jpg">
                    <div class='p-background'>
                        <? echo "              <h2 class='b-name'> $admin_fi[1] $admin_fi[0] </h2>"; ?>
                        <? echo "              <p class='b-info'> $admin_role </p>"; ?>
                    </div>
                    <div class='info-background'>

                        <div class="user-info">
                            <p> Имя администрации: </p>
                            <? echo "<p> $admin_name </p>"; ?>
                            <hr>
                            <p> День рождения: </p>
                            <? echo "<p> $admin_birth </p>"; ?>
                            <hr>
                            <p> Кабинет: </p>
                            <? echo "<p> $admin_classroom </p>"; ?>
                        </div>
                        <div class="profile-info">
                            <p> Номер: </p>
                            <? echo "<p> $admin_phone </p>"; ?>
                            <hr>
                            <p> Почта администрации: </p>
                            <? echo "<p> $admin_email </p>"; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>