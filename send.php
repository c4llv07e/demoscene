<?php
    $str = $_POST['str'];
    echo $str;

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    $link = new mysqli($server, $username, $password, $db);
    mysqli_set_charset($link, "utf8");

    $sql = "INSERT INTO near SET comment = '$str'";
    $result = mysqli_query($link, $sql);
?>