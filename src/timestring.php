<?php

$query = isset($argv[1]) ? $argv[1] : '';

if (empty($query)) {
	$value = "";
	$sub = "";
} else if (strlen($query) == 10 && intval($query) == $query) {
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

