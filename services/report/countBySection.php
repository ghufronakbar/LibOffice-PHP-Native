<?php
require_once './utils/db.php';

function countBySection()
{
    global $conn;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT s.name AS sectionName, COUNT(b.bookId) AS totalBooks 
              FROM book b 
              JOIN section s ON b.sectionId = s.sectionId 
              GROUP BY s.name;";
    
    $result = $conn->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $counts = $result->fetch_all(MYSQLI_ASSOC);

    return $counts;
}
