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

    $person = mysqli_query($connection, "SELECT * FROM Student WHERE Student.StudentID = 1 LIMIT 1");
//    $result = mysqli_query($connection, "SELECT * FROM UniversityGroup");
//
//    if (!$result || !$person) {
//        die("Ошибка запроса к базе данных</br>") . mysqli_error($connection);
//    }
//
//    $person - mysqli_fetch_assoc($person);
    echo "Имя: $_GET[StudentId]";
//?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset = windows-1251" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>

<body class = "container">
    <form method="post" action="update.php">
        <div class="row mb-3">
            <label class="col-4">Name
                <input type="text" id="Name" class="form-control" name="Name" value="<?= $person["Name"] ?>">
            </label>
        </div>
        <div class="row mb-3">
            <label class="col-4">Surname
                <input type="text" id="Surname" class="form-control" name="Surname" value="<?= $person["Surname"] ?>">
            </label>
        </div>
        <div class="row mb-3">
            <label class="col-4">Middle name
                <input type="text" id="MiddleName" class="form-control" name="MiddleName" value="<?= $person["MiddleName"] ?>">
            </label>
        </div>

        <div class="row mb-4">
            <label class="col-4">Group
                <select name="GroupId" class="form-control">
                    <?php while ($group = mysqli_fetch_array($result)) : ?>
                        <option <?= $group["GroupId"] === $person["GroupId"] ? "selected" : "" ?> value="<?=$group["GroupId"] ?>">
                            <?= $group["Name"] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </label>
        </div>
        <input type="hidden" name="StudentId" value="<?=$person["StudentId"]?>">
        <input type="submit" class="btn btn-primary" value="Save">
    </form>
</body>
</html>
