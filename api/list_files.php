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

    $token = "token";
    $path = realpath($path);
    header("Content-Type: text/json");

    if (is_dir($path)){

        $dir    = $path;
        $files1 = scandir($dir);

        $dirs = array();
        $files = array();

        foreach ($files1 as $name) {
            if ($name != ".." AND $name != "."){
                //echo "<a href='list_files.php?path=" . $path . "/" . $name . "'>" . $name . "</a>";
                if (is_dir($path . "/" . $name)){
                    array_push($dirs,array("path" => $path . "/" . $name, "name" => $name));
                }else{
                    array_push($files,array("path" => $path . "/" . $name, "name" => $name));
                }
            }
        }

        $final = '{"files":[{"type":"dir","path":"' . $path . '/..","name": ".."}';
        foreach ($dirs as $line) {
            $final .= ',{"type":"dir","path":"' . htmlentities($line["path"]) . '","name":"' . $line["name"] . '"}';
        }
        foreach ($files as $line) {
            $final .= ',{"type":"file","path":"' . htmlentities($line["path"]) . '","name":"' . $line["name"] . '"}';
        }
        $final .= '],';
        $final .= '"local": {"path": "' . $path . '","basename": "' . basename($path) . '"}';
        $final .= '}';

        echo $final;
    
    }else{
        $final = '{"files":[{"type":"dir","path":"' . $path . '/..","name": ".."}';
        $final .= ',{"type":"file","path":"' . dirname($path) . '/' . basename($path) . '","name":"' . basename($path) . '"}';
        $final .= '],';
        if (basename($path) == ""){
            $final .= '"local": {"path": "' . $path . '","basename": "/"}';
        }else{
            $final .= '"local": {"path": "' . $path . '","basename": "' . basename($path) . '"}';
        }
        $final .= '}';

        header("Content-Type: text/json");
        echo $final;
    }
?>
