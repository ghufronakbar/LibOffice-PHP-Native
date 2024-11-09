<?php
require_once './utils/db.php';

function countBySection()
{
    global $conn;

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk menghitung buku per section
    $query = "SELECT s.name AS sectionName, COUNT(b.bookId) AS totalBooks 
              FROM book b 
              JOIN section s ON b.sectionId = s.sectionId 
              GROUP BY s.name;";
    
    // Eksekusi query
    $result = $conn->query($query);

    // Cek apakah query berhasil
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    // Ambil semua hasil
    $counts = $result->fetch_all(MYSQLI_ASSOC);

    return $counts;
}
