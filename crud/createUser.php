<?php
require '../dbConfig/config.php';
require '../dbConfig/connection.php';

$usersClass = new User();

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$birthdate = filter_input(INPUT_POST, "birthdate", FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
$url = filter_input(INPUT_POST, "url", FILTER_SANITIZE_STRING);

$createUser = $usersClass->createUser($username, $email, $password, $birthdate, $phone, $url);
echo json_encode(['status' => $createUser]);
