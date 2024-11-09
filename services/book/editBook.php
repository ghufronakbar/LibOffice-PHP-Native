<?php
require_once './utils/db.php';

function editBook($bookId, $title, $synopsis, $picture = null, $sectionId, $author = null, $publishedAt = null)
{
    global $conn;

    try {
        $conn->begin_transaction();

        if ($picture) {
            $stmt = $conn->prepare("UPDATE book SET title = ?, synopsis = ?, picture = ?, sectionId = ?, updatedAt = NOW() WHERE bookId = ?");
            $stmt->bind_param("sssii", $title, $synopsis, $picture, $sectionId, $bookId);
        } else {
            $stmt = $conn->prepare("UPDATE book SET title = ?, synopsis = ?, sectionId = ?, updatedAt = NOW() WHERE bookId = ?");
            $stmt->bind_param("ssii", $title, $synopsis, $sectionId, $bookId);
        }

        $stmt->execute();

        $stmtDetail = $conn->prepare("UPDATE detailBook SET author = ?, publishedAt = ?, updatedAt = NOW() WHERE bookId = ?");
        $stmtDetail->bind_param("ssi", $author, $publishedAt, $bookId);
        $stmtDetail->execute();

        $conn->commit();

        return $bookId;
    } catch (Exception $e) {
        $conn->rollback();
        throw $e;
    }
}
