<?php
require 'core/database.php';
require 'core/functions.php';

$message = '';

// Handle form submission for creating a new applicant
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'subjectSpecialization' => $_POST['subjectSpecialization'],
        'location' => $_POST['location'],
        'yearsOfExperience' => $_POST['yearsOfExperience'],
        'preferredGradeLevel' => $_POST['preferredGradeLevel'],
        'contactEmail' => $_POST['contactEmail'],
        'favoriteTeachingMethod' => $_POST['favoriteTeachingMethod']
    ];

    $result = createTeacher($pdo, $data);
    $message = $result['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Teacher</title>
</head>
<body>
    <h1>Create New Teacher</h1>
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form method="POST" action="create.php">
        <label>First Name:</label>
        <input type="text" name="firstName" required>
        
        <label>Last Name:</label>
        <input type="text" name="lastName" required>

        <label>Subject Specialization:</label>
        <input type="text" name="subjectSpecialization" required>

        <label>Location:</label>
        <input type="text" name="location">

        <label>Years of Experience:</label>
        <input type="number" name="yearsOfExperience" min="0">

        <label>Preferred Grade Level:</label>
        <input type="text" name="preferredGradeLevel">

        <label>Contact Email:</label>
        <input type="email" name="contactEmail" required>

        <label>Favorite Teaching Method:</label>
        <input type="text" name="favoriteTeachingMethod">

        <button type="submit">Create Teacher</button>
    </form>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
