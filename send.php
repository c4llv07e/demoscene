<?php
    $str = $_POST['str'];
    echo $str;
    // file_put_contents('data.php', '<p>' . $str . '</p>', FILE_APPEND);
    // include_once('data.php');

    $link = mysqli_connect("us-cdbr-east-04.cleardb.com", "bae47087acc5a8", "69125eeb");

    if ($link == false) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    }
    else {
        print("Соединение установлено успешно");
        mysqli_set_charset($con, "utf8");
    }

    $sql = 'INSERT INTO near SET comment = "'  . $str . '"';
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }

?>