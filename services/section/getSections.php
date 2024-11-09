<?php
require_once './utils/db.php';

function getSections()
{
    global $conn;

    $query = "SELECT s.sectionId, s.name, s.createdAt, (SELECT COUNT(b.bookId) FROM book b WHERE b.sectionId = s.sectionId) AS countBook FROM section s ORDER BY s.createdAt DESC";
    $result = $conn->query($query);
    $sections = $result->fetch_all(MYSQLI_ASSOC);

    return $sections;
}

