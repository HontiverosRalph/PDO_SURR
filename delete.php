<?php
require 'core/database.php';
require 'core/functions.php';

$message = '';

// Delete the teacher if ID is provided
if (isset($_GET['id'])) {
    $teacherID = $_GET['id'];
    $result = deleteTeacher($pdo, $teacherID);
    $message = $result['message'];
} else {
    $message = "No teacher ID provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Teacher</title>
</head>
<body>
    <h1>Delete Teacher</h1>
    <p><?= htmlspecialchars($message) ?></p>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
