<?php
session_start();
include('../dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_message'])) {
    // Handle message deletion
    $messageId = $_POST['delete_message'];
    
    // Check if the message belongs to the current user (for security)
    $fromUser = $_SESSION['user'];
    $stmtCheckOwnership = $pdo->prepare("SELECT * FROM message WHERE id = :messageId AND fromUser = :fromUser");
    $stmtCheckOwnership->bindParam(':messageId', $messageId);
    $stmtCheckOwnership->bindParam(':fromUser', $fromUser);
    $stmtCheckOwnership->execute();
    $message = $stmtCheckOwnership->fetch(PDO::FETCH_ASSOC);

    if ($message) {
        // The message belongs to the current user, so it can be deleted
        $stmtDelete = $pdo->prepare("DELETE FROM message WHERE id = :messageId");
        $stmtDelete->bindParam(':messageId', $messageId);
        
        if ($stmtDelete->execute()) {
            // Deletion was successful
            header("Location: your-original-page.php");
            exit();
        } else {
            // Handle deletion failure
            echo "Failed to delete the message.";
        }
    } else {
        // Message doesn't belong to the current user (security issue)
        echo "You are not allowed to delete this message.";
    }
} else {
    // Invalid request
    echo "Invalid request.";
}
?>

