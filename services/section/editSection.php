<?php
require_once './utils/db.php';

function editSection($sectionId, $name)
{
    global $conn;

    try {
        $conn->begin_transaction();

        $stmt = $conn->prepare("UPDATE section SET name = ? WHERE sectionId = ?");
        $stmt->bind_param("si", $name, $sectionId);
        $stmt->execute();

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        throw $e;
    }
}
