<?php
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "BadWolf";
    $db_database = "Lab7_Uni";

    $connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);
    if (!$connection) {
        die("Ошибка подключения к базе" . $db_host);
    }

    $bd_select = mysqli_select_db($connection, $db_database);
    if (!$bd_select) {
        die("Ошибка при выборе бызы даных");
    }

    $result = mysqli_query($connection, "DELETE FROM Student WHERE Student.StudentId = $_GET[StudentId]");

    if (!$result) {
        die("Ошибка запроса к базе данных</br>") . mysqli_error($connection);
    } else {
        header("Location: ./index.php");
        die();
    }