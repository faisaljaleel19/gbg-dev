<?php
require '../dbConfig/config.php';
require '../dbConfig/connection.php';

$usersClass = new User();

$userId = filter_input(INPUT_POST, "userId", FILTER_SANITIZE_STRING);

$getUser = $usersClass->getUserId($userId);
echo json_encode(['data' => $getUser]);