<?php
require_once './utils/db.php';

function getCounts() {
    global $conn;

    $totalBooksQuery = "SELECT COUNT(*) as total FROM book";
    $totalBooksResult = $conn->query($totalBooksQuery);
    $totalBooks = $totalBooksResult->fetch_assoc()['total'];

    $totalSectionsQuery = "SELECT COUNT(*) as total FROM section";
    $totalSectionsResult = $conn->query($totalSectionsQuery);
    $totalSections = $totalSectionsResult->fetch_assoc()['total'];

    return [
        'totalBooks' => $totalBooks,
        'totalSections' => $totalSections
    ];
}
?>
