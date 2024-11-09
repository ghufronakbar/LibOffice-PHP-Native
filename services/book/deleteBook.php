<?php
require_once './utils/db.php';

function deleteBook($bookId)
{
    global $conn;

    try {
        $conn->begin_transaction();

        $stmt = $conn->prepare("SELECT picture FROM book WHERE bookId = ?");
        $stmt->bind_param("i", $bookId);
        $stmt->execute();
        $stmt->bind_result($picture);
        $stmt->fetch();
        $stmt->close();

        if ($picture) {
            $filePath = './src/uploads/' . $picture;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $stmtDeleteBook = $conn->prepare("DELETE FROM book WHERE bookId = ?");
        $stmtDeleteBook->bind_param("i", $bookId);
        $stmtDeleteBook->execute();
        $stmtDeleteBook->close();

        $stmtDeleteDetail = $conn->prepare("DELETE FROM detailBook WHERE bookId = ?");
        $stmtDeleteDetail->bind_param("i", $bookId);
        $stmtDeleteDetail->execute();
        $stmtDeleteDetail->close();

        $conn->commit();

        return true;
    } catch (Exception $e) {
        $conn->rollback();
        throw $e;
    }
}
