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



    $Name = $_POST["Name"];
    $Surname = $_POST["Surname"];
    $MiddleName = $_POST["MiddleName"];
    $GroupID = $_POST["GroupID"];
    $StudentID = $_POST["StudentID"];

    $result = mysqli_query($connection, "UPDATE Student SET
                   GroupID = $GroupID,
                   Name = $Name
                   WHERE StudentID = $StudentID");

    if (!$result) {
        die("Ошибка запроса к базе данных</br>") . mysqli_error($connection);
    } else {
        header("Location: ./index.php");
        die();
    }
