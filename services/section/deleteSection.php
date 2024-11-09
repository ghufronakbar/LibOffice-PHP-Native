<?php
require_once './utils/db.php';

function deleteSection($sectionId)
{
    global $conn;

    try {
        $conn->begin_transaction();

        $stmt = $conn->prepare("DELETE FROM section WHERE sectionId = ?");
        $stmt->bind_param("i", $sectionId);
        $stmt->execute();

        $conn->commit();

        return $stmt->affected_rows;
    } catch (Exception $e) {
        $conn->rollback();
        throw $e;
    }
}
