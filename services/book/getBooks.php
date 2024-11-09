<?php
require_once './utils/db.php';

function getBooks()
{
    global $conn;

    $query = "SELECT b.bookId, b.title, b.synopsis, b.picture, b.createdAt, db.author, db.publishedAt, s.name AS sectionName, s.sectionId
              FROM book b
              INNER JOIN detailBook db ON b.bookId = db.bookId
              INNER JOIN section s ON b.sectionId = s.sectionId
              ORDER BY b.createdAt DESC";
    $result = $conn->query($query);
    $books = $result->fetch_all(MYSQLI_ASSOC);

    return $books;
}

