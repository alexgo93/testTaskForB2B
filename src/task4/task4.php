<?php

/**
 * @param string $userIds
 * @return array
 */
function loadUsersData(string $userIds): array
{
    $userIds = explode(',', $userIds);
    foreach ($userIds as $userId) {
        $db = mysqli_connect("localhost", "root", "123123", "database");
        $sql = mysqli_query($db, "SELECT * FROM users WHERE id=$userId");
        while ($obj = $sql->fetch_object()) {
            $data[$userId] = $obj->name;
        }
        mysqli_close($db);
    }

    return $data;
}

// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48
$data = loadUsersData($_GET['userIds']);
foreach ($data as $userId => $name) {
    echo "<a href=\"/show_user.php?id=$userId\">$name</a>";
}