<?php
require 'core/database.php';
require 'core/functions.php';

$message = '';
$teacher = null;

// Fetch the record to edit
if (isset($_GET['id'])) {
    $teacherID = $_GET['id'];
    $result = getTeacherByID($pdo, $teacherID);
    $teacher = $result['querySet'][0] ?? null;
    if (!$teacher) {
        $message = "Teacher not found.";
    }
}

// Handle form submission for updating the teacher
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacherID = $_POST['teacherID'];
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

    $result = updateTeacher($pdo, $teacherID, $data);
    $message = $result['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Teacher</title>
</head>
<body>
    <h1>Edit Teacher</h1>
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <?php if ($teacher): ?>
        <form method="POST" action="edit.php">
            <input type="hidden" name="teacherID" value="<?= htmlspecialchars($teacher['teacherID']) ?>">

            <label>First Name:</label>
            <input type="text" name="firstName" value="<?= htmlspecialchars($teacher['firstName']) ?>" required>

            <label>Last Name:</label>
            <input type="text" name="lastName" value="<?= htmlspecialchars($teacher['lastName']) ?>" required>

            <label>Subject Specialization:</label>
            <input type="text" name="subjectSpecialization" value="<?= htmlspecialchars($teacher['subjectSpecialization']) ?>" required>

            <label>Location:</label>
            <input type="text" name="location" value="<?= htmlspecialchars($teacher['location']) ?>">

            <label>Years of Experience:</label>
            <input type="number" name="yearsOfExperience" min="0" value="<?= htmlspecialchars($teacher['yearsOfExperience']) ?>">

            <label>Preferred Grade Level:</label>
            <input type="text" name="preferredGradeLevel" value="<?= htmlspecialchars($teacher['preferredGradeLevel']) ?>">

            <label>Contact Email:</label>
            <input type="email" name="contactEmail" value="<?= htmlspecialchars($teacher['contactEmail']) ?>" required>

            <label>Favorite Teaching Method:</label>
            <input type="text" name="favoriteTeachingMethod" value="<?= htmlspecialchars($teacher['favoriteTeachingMethod']) ?>">

            <button type="submit">Update Teacher</button>
        </form>
    <?php else: ?>
        <p>No teacher found with this ID.</p>
    <?php endif; ?>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
