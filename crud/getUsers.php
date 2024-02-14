<?php

require '../dbConfig/config.php';
require '../dbConfig/connection.php';

$usersClass = new User();

$users = $usersClass->getUsers();

if ($users) {
    // show the publishers
    foreach ($users as $row) {
        echo "<tr>";
        echo "<td class='userId' style='display: none;'>".$row['id']."</td>";
        echo "<td class='username'>".$row['username']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td><button class='btn btn-danger deleteBtn'>X</button></td>";
        echo "</tr>";
    }
}
else
{
    echo "<tr><td colspan='4'>No users found</td></tr>";
}

