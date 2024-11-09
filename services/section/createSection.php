<?php
require_once './utils/db.php';

function createSection($name)
{
    global $conn;

    $stmt = $conn->prepare("INSERT INTO section (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    return $stmt->insert_id;
}

