<?php
require_once './utils/db.php';

function createBook($title, $synopsis, $picture, $sectionId, $author = null, $publishedAt = null)
{
    global $conn;

    try {
        $conn->begin_transaction();

        $stmt = $conn->prepare("INSERT INTO book (title, synopsis, picture, sectionId, createdAt, updatedAt) VALUES (?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("sssi", $title, $synopsis, $picture, $sectionId);
        $stmt->execute();

        $bookId = $stmt->insert_id;

        $stmtDetail = $conn->prepare("INSERT INTO detailBook (bookId, author, publishedAt, createdAt, updatedAt) VALUES (?, ?, ?, NOW(), NOW())");
        $stmtDetail->bind_param("iss", $bookId, $author, $publishedAt);
        $stmtDetail->execute();

        $conn->commit();

        return $bookId;

    } catch (Exception $e) {        
        $conn->rollback();
        throw $e;
    }
}
