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

    // $sql = "INSERT INTO near(comment, data) VALUES ('$str', NOW())";
    // $result = mysqli_query($link, $sql);

    // $sql = "SELECT id FROM near ORDER BY id DESC LIMIT 0, 1";

    $sql = "SELECT comment, data, id FROM near WHERE id>=25 ORDER BY id";
    $result = mysqli_query($link, $sql);
    $types = array();
    while($row =  mysqli_fetch_assoc($result)) {
        array_push($types, array('comment' => $row['comment'], 'data' => $row['data'], 'id' => $row['id']));
    }

    echo json_encode($types, JSON_UNESCAPED_UNICODE);
?>