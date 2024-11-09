<?php
require_once './utils/db.php';

function countMonthlyCreated()
{
    global $conn;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        
    $query = "
        SELECT 
            DATE_FORMAT(createdAt, '%Y-%m') AS month, 
            COUNT(bookId) AS totalBooks 
        FROM 
            book 
        GROUP BY 
            month 
        ORDER BY 
            month;
    ";

    $result = $conn->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $monthlyCounts = $result->fetch_all(MYSQLI_ASSOC);

    return $monthlyCounts;
}
