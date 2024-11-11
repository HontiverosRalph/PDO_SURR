<?php

// Database connection function
function connectDB() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=job_application', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// CREATE: Insert a new teacher record
function createTeacher($pdo, $data) {
    try {
        $stmt = $pdo->prepare("INSERT INTO Teachers (firstName, lastName, subjectSpecialization, location, yearsOfExperience, preferredGradeLevel, contactEmail, favoriteTeachingMethod) VALUES (:firstName, :lastName, :subjectSpecialization, :location, :yearsOfExperience, :preferredGradeLevel, :contactEmail, :favoriteTeachingMethod)");
        $stmt->execute($data);
        return [
            'message' => 'Teacher created successfully.',
            'statusCode' => 200
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Error: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}

// READ: Fetch a single teacher by ID
function getTeacherByID($pdo, $teacherID) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM Teachers WHERE teacherID = :teacherID");
        $stmt->execute(['teacherID' => $teacherID]);
        $querySet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return [
            'querySet' => $querySet,
            'statusCode' => 200
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Error: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}

// UPDATE: Update a teacher's information
function updateTeacher($pdo, $teacherID, $data) {
    try {
        $data['teacherID'] = $teacherID;
        $stmt = $pdo->prepare("UPDATE Teachers SET firstName = :firstName, lastName = :lastName, subjectSpecialization = :subjectSpecialization, location = :location, yearsOfExperience = :yearsOfExperience, preferredGradeLevel = :preferredGradeLevel, contactEmail = :contactEmail, favoriteTeachingMethod = :favoriteTeachingMethod WHERE teacherID = :teacherID");
        $stmt->execute($data);
        return [
            'message' => 'Teacher updated successfully.',
            'statusCode' => 200
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Error: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}

// DELETE: Delete a teacher by ID
function deleteTeacher($pdo, $teacherID) {
    try {
        $stmt = $pdo->prepare("DELETE FROM Teachers WHERE teacherID = :teacherID");
        $stmt->execute(['teacherID' => $teacherID]);
        return [
            'message' => 'Teacher deleted successfully.',
            'statusCode' => 200
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Error: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}

function searchTeachers($pdo, $criteria) {
    $query = "SELECT * FROM Teachers WHERE ";
    $params = [];
    
    foreach ($criteria as $column => $value) {
        $query .= "$column LIKE :$column AND ";
        $params[$column] = "%$value%";
    }
    
    $query = rtrim($query, ' AND '); // Remove the trailing 'AND'
    
    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return [
            'message' => 'Search completed successfully.',
            'statusCode' => 200,
            'querySet' => $result
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Failed to execute search: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}
?>


?>
