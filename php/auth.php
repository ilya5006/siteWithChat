<?
require_once 'connection.php';
session_start();

if (isset($_SESSION['id_user'])) 
{
    header('Location: ../student_you.php');
}

$email_auth = $_POST['email-auth'];
$password_auth = $_POST['password-auth'];
$button_auth = $_POST['button-auth'];

// ПОЛУЧАЕМ РОЛЬ И АЙДИ ЮЗЕРА
$query_login = "SELECT id_role, id_user FROM users WHERE email = '$email_auth' AND password = '$password_auth'";
$result_login = mysqli_query($link, $query_login);
$data_login = mysqli_fetch_row($result_login);

// ЕСЛИ АЙДИ ЮЗЕРА = 3, ТО ЕСТЬ СТУДЕНТ
if ($data_login[0] == 3)
{
    $query_auth = "SELECT id_student, students.name, roles.name FROM students, roles WHERE students.id_role = roles.id_role AND students.id_user = '$data_login[1]'";
    $result_auth = mysqli_query($link, $query_auth);
    $data_auth = mysqli_fetch_row($result_auth);
    $_SESSION['id_user'] = "$data_auth[0]";
    $_SESSION['id_role'] = "$data_login[0]";
    $_SESSION['user_info'] = [$data_auth[1], $data_auth[2]];
    header('Location: ../student_you.php');
}

// ЕСЛИ АЙДИ ЮЗЕРА = 2, ТО ЕСТЬ УЧИТЕЛЬ
if ($data_login[0] == 2)
{
    $query_auth = "SELECT id_teacher, teachers.name, roles.name FROM teachers, roles WHERE teachers.id_role = roles.id_role AND teachers.id_user = '$data_login[1]'";
    $result_auth = mysqli_query($link, $query_auth);
    $data_auth = mysqli_fetch_row($result_auth);
    $_SESSION['id_user'] = "$data_auth[0]";
    $_SESSION['id_role'] = "$data_login[0]";
    $_SESSION['user_info'] = [$data_auth[1], $data_auth[2]];
    header('Location: ../student_you.php');
}

// ЕСЛИ АЙДИ ЮЗЕРА = 1, ТО ЕСТЬ АДМИНИСТРАЦИЯ
if ($data_login[0] == 1)
{
    $query_auth = "SELECT id_administration, administrations.name, roles.name FROM administrations, roles WHERE administrations.id_role = roles.id_role AND administrations.id_user = '$data_login[1]'";
    $result_auth = mysqli_query($link, $query_auth);
    $data_auth = mysqli_fetch_row($result_auth);
    $_SESSION['id_user'] = "$data_auth[0]";
    $_SESSION['id_role'] = "$data_login[0]";
    $_SESSION['user_info'] = [$data_auth[1], $data_auth[2]];
    header('Location: ../student_you.php');
}

if (empty($_SESSION['id_user'])) 
{
    header('Location: ../login.php');
}
?>