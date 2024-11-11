<?php
require 'core/database.php'; // Include the database connection
require 'core/functions.php'; // Include the functions for CRUD operations

// Initialize variables
$searchResults = [];
$searchCriteria = [];
$message = '';

// Handle search form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchCriteria = [
        'firstName' => $_POST['firstName'] ?? '',
        'lastName' => $_POST['lastName'] ?? '',
        'subjectSpecialization' => $_POST['subjectSpecialization'] ?? '',
        'location' => $_POST['location'] ?? '',
        'yearsOfExperience' => $_POST['yearsOfExperience'] ?? '',
        'preferredGradeLevel' => $_POST['preferredGradeLevel'] ?? '',
        'contactEmail' => $_POST['contactEmail'] ?? '',
        'favoriteTeachingMethod' => $_POST['favoriteTeachingMethod'] ?? '',
    ];
    
    $searchResults = searchTeachers($pdo, array_filter($searchCriteria)); // Remove empty fields
    $message = $searchResults['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application System for Teachers</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: Link to your CSS file -->
</head>
<body>
    <h1>Job Application System for Teachers</h1>

    <!-- Search Form -->
    <form method="POST" action="index.php">
        <h2>Search for Teachers</h2>
        <label>First Name:</label>
        <input type="text" name="firstName" value="<?= htmlspecialchars($searchCriteria['firstName'] ?? '') ?>">
        
        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?= htmlspecialchars($searchCriteria['lastName'] ?? '') ?>">

        <label>Subject Specialization:</label>
        <input type="text" name="subjectSpecialization" value="<?= htmlspecialchars($searchCriteria['subjectSpecialization'] ?? '') ?>">

        <label>Location:</label>
        <input type="text" name="location" value="<?= htmlspecialchars($searchCriteria['location'] ?? '') ?>">

        <label>Years of Experience:</label>
        <input type="number" name="yearsOfExperience" min="0" value="<?= htmlspecialchars($searchCriteria['yearsOfExperience'] ?? '') ?>">

        <label>Preferred Grade Level:</label>
        <input type="text" name="preferredGradeLevel" value="<?= htmlspecialchars($searchCriteria['preferredGradeLevel'] ?? '') ?>">

        <label>Contact Email:</label>
        <input type="email" name="contactEmail" value="<?= htmlspecialchars($searchCriteria['contactEmail'] ?? '') ?>">

        <label>Favorite Teaching Method:</label>
        <input type="text" name="favoriteTeachingMethod" value="<?= htmlspecialchars($searchCriteria['favoriteTeachingMethod'] ?? '') ?>">

        <button type="submit" name="search">Search</button>
    </form>

    <!-- Display Search Results -->
    <h2>Search Results</h2>
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <?php if (!empty($searchResults['querySet'])): ?>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Subject Specialization</th>
                    <th>Location</th>
                    <th>Years of Experience</th>
                    <th>Preferred Grade Level</th>
                    <th>Contact Email</th>
                    <th>Favorite Teaching Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($searchResults['querySet'] as $teacher): ?>
                    <tr>
                        <td><?= htmlspecialchars($teacher['firstName']) ?></td>
                        <td><?= htmlspecialchars($teacher['lastName']) ?></td>
                        <td><?= htmlspecialchars($teacher['subjectSpecialization']) ?></td>
                        <td><?= htmlspecialchars($teacher['location']) ?></td>
                        <td><?= htmlspecialchars($teacher['yearsOfExperience']) ?></td>
                        <td><?= htmlspecialchars($teacher['preferredGradeLevel']) ?></td>
                        <td><?= htmlspecialchars($teacher['contactEmail']) ?></td>
                        <td><?= htmlspecialchars($teacher['favoriteTeachingMethod']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $teacher['teacherID'] ?>">Edit</a> |
                            <a href="delete.php?id=<?= $teacher['teacherID'] ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

    <!-- Links to other pages -->
    <p><a href="create.php">Add New Teacher</a></p>

</body>
</html>
