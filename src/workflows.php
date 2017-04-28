<?php
// need set timezone
date_default_timezone_set('Asia/Shanghai');

$query = isset($argv[1]) ? $argv[1] : '';
$value = $query;
$sub = "";

if (strlen($query) == 10 && intval($query) === $query) {
    // timestamp string
    $value = date("Y-m-d H:i:s", $query);
    $sub = "copy date string";
} else {
    // guess
    $value = strtotime($query);
    $sub = "timestamp";
}

$data = array("items" => array(
    array(
        "uid" =>time(),
        "title" => $value,
        "subtitle" => $sub,
        "arg" => $value,
        "icon" => array(
            "path" => "icon.png"
        ),
        "text" => array(
            "copy" => $value,
        ),
    )
));

echo json_encode($data, 1);

