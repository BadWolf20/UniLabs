<!DOCTYPE html>
<html xmlns:color = "http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset = windows-1251" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
    </head>

    <body><?php tableFormatter() ?></body>
</html>

<?php
    function getDataByQuery($connection, $query) {
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Ошибка запроса к базе данных</br>") . mysqli_error($connection);
        }
        return $result;
    }

    function tableFormatter() {

        echo "<table class='table w-75 table-bordered'>";
        include_once("./dbConfig.php");

        $connection = mysqli_connect($db_host, $db_username, $db_password);
        if (!$connection) {
            die("Ошибка подключения к базе");
        }

        $bd_select = mysqli_select_db($connection, $bd_database);
        if (!$bd_select) {
            die("Ошибка при выборе бызы даных");
        }


        foreach (getDataByQuery($connection, "SELECT * FROM `UniversityGroup`") as $group) {
            echo "<tr><td colspan='3' class='fw-bold table-active'>" . $group[Name] . "</td></tr>";
            foreach (getDataByQuery($connection, "SELECT * FROM `Student` WHERE Student.GroupID = {$group['GroupID']}") as $person) {
                echo "<tr><td>" . $person["Name"] . " " . $person["Surname"] . "</td>";
                echo "<td class='text-info'>" . $person["Mail"] . "</td>";
                echo '
                <td>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0279FD" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0279FD" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0279FD" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                        <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                    </svg>
                </td>
                </tr>';
            }
        }
        echo '</table';
    }
?>