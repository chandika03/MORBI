<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the 'toUser' and 'fromUser' values from the AJAX request
    $toUser = $_POST['toUser'];
    $fromUser = $_POST['fromUser'];

    // Perform any necessary validation or data processing here

    // Send the message
    $message = "Hello, $toUser! This is a message from $fromUser.";
    // Add code here to send the message to the appropriate user

    // Return a response to the AJAX request
    echo "Message sent successfully!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Message</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sendButton").click(function() {
                var toUser = <?php echo json_encode($_GET['toUser']); ?>;
                var fromUser = <?php echo json_encode($_SESSION['fromUser']); ?>;
                
                $.ajax({
                    url: "",
                    type: "POST",
                    data: { toUser: toUser, fromUser: fromUser },
                    success: function(response) {
                        // Handle the response from the server
                        alert(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <button id="sendButton">Send Message</button>
</body>
</html>