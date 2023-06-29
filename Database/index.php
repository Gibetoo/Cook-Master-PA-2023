<?php


require_once __DIR__ . "/libraries/body.php";
require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";
require_once __DIR__ . "/libraries/response.php";

if (isPostMethod()) {
    require_once __DIR__ . "/routes/users/post.php";
    die();
}

if (isGetMethod()) {
    require_once __DIR__ . "/routes/users/get.php";
    die();
}

echo jsonResponse(404, [], [
    "success" => false,
    "message" => "Route not found"
]);
