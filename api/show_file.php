<?php

    session_start();
    require_once(__DIR__ . "/../assets/inc/userList.inc.php");
    require_once(__DIR__ . "/../assets/inc/checkLogin.inc.php");

    if (!checkLogin()) {
        header('WWW-Authenticate: OAuth realm="Access to fileExplorer"', true, 401);
        die("invalid login");
    }

    if (isset($_GET["path"])){
        $path = $_GET["path"];
    }else{
        die("Missing Path");
    }

    $mime = mime_content_type($path);
    header("Content-Type: " . $mime);
    //var_dump(pathinfo($path));
    echo file_get_contents($path);

?>
