CREATE TABLE IF NOT EXISTS Teachers (
    teacherID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    subjectSpecialization VARCHAR(100) NOT NULL,
    location VARCHAR(100),
    yearsOfExperience INT CHECK (yearsOfExperience >= 0),
    preferredGradeLevel VARCHAR(50),
    contactEmail VARCHAR(100) UNIQUE NOT NULL,
    favoriteTeachingMethod VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO Teachers (firstName, lastName, subjectSpecialization, location, yearsOfExperience, preferredGradeLevel, contactEmail, favoriteTeachingMethod) VALUES 
('John', 'Doe', 'Mathematics', 'New York', 5, 'High School', 'john.doe@example.com', 'Hands-on Experiments'),
('Jane', 'Smith', 'English Literature', 'California', 8, 'Middle School', 'jane.smith@example.com', 'Storytelling and Discussion'),
('Michael', 'Johnson', 'Physics', 'Texas', 10, 'High School', 'michael.johnson@example.com', 'Problem-Solving Workshops'),
('Emily', 'Davis', 'Chemistry', 'Florida', 3, 'College', 'emily.davis@example.com', 'Lab Experiments'),
('Robert', 'Wilson', 'Biology', 'Washington', 7, 'High School', 'robert.wilson@example.com', 'Field Trips and Observations'),
('Sarah', 'Brown', 'History', 'Oregon', 6, 'Middle School', 'sarah.brown@example.com', 'Role Play'),
('David', 'Lee', 'Computer Science', 'Nevada', 9, 'College', 'david.lee@example.com', 'Project-Based Learning'),
('Sophia', 'Martinez', 'Geography', 'Arizona', 4, 'High School', 'sophia.martinez@example.com', 'Interactive Maps'),
('James', 'Garcia', 'Physical Education', 'Utah', 2, 'Elementary', 'james.garcia@example.com', 'Games and Drills'),
('Linda', 'Lopez', 'Art', 'Colorado', 11, 'Middle School', 'linda.lopez@example.com', 'Creativity Workshops'),
('Daniel', 'Harris', 'Mathematics', 'Georgia', 12, 'College', 'daniel.harris@example.com', 'Logical Problem Solving'),
('Patricia', 'Clark', 'English Literature', 'North Carolina', 1, 'High School', 'patricia.clark@example.com', 'Poetry and Prose Analysis'),
('Charles', 'Rodriguez', 'Physics', 'Virginia', 3, 'High School', 'charles.rodriguez@example.com', 'Physics Simulations'),
('Jessica', 'Walker', 'Chemistry', 'Ohio', 5, 'Middle School', 'jessica.walker@example.com', 'Interactive Labs'),
('Thomas', 'Allen', 'Biology', 'Minnesota', 8, 'College', 'thomas.allen@example.com', 'Case Studies'),
('Karen', 'Young', 'History', 'Indiana', 7, 'Elementary', 'karen.young@example.com', 'Historical Reenactments'),
('Joshua', 'King', 'Computer Science', 'Massachusetts', 9, 'High School', 'joshua.king@example.com', 'Coding Challenges'),
('Ashley', 'Wright', 'Geography', 'Missouri', 2, 'Middle School', 'ashley.wright@example.com', 'Map Explorations'),
('Joseph', 'Scott', 'Mathematics', 'Maryland', 4, 'College', 'joseph.scott@example.com', 'Analytical Thinking'),
('Megan', 'Green', 'Physical Education', 'Tennessee', 10, 'High School', 'megan.green@example.com', 'Team Sports'),
('Lisa', 'Adams', 'Art', 'Kentucky', 1, 'Elementary', 'lisa.adams@example.com', 'Art Projects'),
('Paul', 'Baker', 'Physics', 'Michigan', 5, 'College', 'paul.baker@example.com', 'Lab Research'),
('Betty', 'Gonzalez', 'English Literature', 'South Carolina', 6, 'Middle School', 'betty.gonzalez@example.com', 'Discussion and Debate'),
('Steven', 'Nelson', 'Chemistry', 'Alabama', 3, 'High School', 'steven.nelson@example.com', 'Hands-On Experiments'),
('Deborah', 'Carter', 'History', 'Louisiana', 4, 'College', 'deborah.carter@example.com', 'Primary Sources Analysis'),
('George', 'Mitchell', 'Mathematics', 'Oklahoma', 7, 'High School', 'george.mitchell@example.com', 'Group Problem Solving'),
('Donna', 'Perez', 'Biology', 'Wisconsin', 8, 'Middle School', 'donna.perez@example.com', 'Nature Exploration'),
('Kenneth', 'Roberts', 'Computer Science', 'Iowa', 2, 'College', 'kenneth.roberts@example.com', 'Software Development Projects'),
('Barbara', 'Turner', 'Geography', 'Mississippi', 9, 'Elementary', 'barbara.turner@example.com', 'Cultural Maps'),
('Matthew', 'Phillips', 'Physical Education', 'Arkansas', 1, 'High School', 'matthew.phillips@example.com', 'Health and Fitness'),
('Shirley', 'Campbell', 'Art', 'Kansas', 10, 'Middle School', 'shirley.campbell@example.com', 'Creative Expression'),
('Edward', 'Parker', 'Physics', 'Nebraska', 4, 'College', 'edward.parker@example.com', 'Physics Projects'),
('Margaret', 'Evans', 'English Literature', 'Idaho', 6, 'High School', 'margaret.evans@example.com', 'Literature Circles'),
('Brian', 'Edwards', 'Chemistry', 'New Hampshire', 11, 'Middle School', 'brian.edwards@example.com', 'Experimentation'),
('Carol', 'Collins', 'History', 'Montana', 7, 'College', 'carol.collins@example.com', 'Storytelling'),
('Kevin', 'Stewart', 'Mathematics', 'Maine', 5, 'High School', 'kevin.stewart@example.com', 'Problem-Solving'),
('Nancy', 'Sanchez', 'Biology', 'Hawaii', 2, 'Elementary', 'nancy.sanchez@example.com', 'Animal Observations'),
('Timothy', 'Morris', 'Computer Science', 'Alaska', 8, 'High School', 'timothy.morris@example.com', 'Web Development Projects'),
('Sandra', 'Rogers', 'Geography', 'Vermont', 3, 'Middle School', 'sandra.rogers@example.com', 'Atlas Studies'),
('Jason', 'Reed', 'Physical Education', 'Rhode Island', 9, 'College', 'jason.reed@example.com', 'Wellness Programs'),
('Ruth', 'Cook', 'Art', 'Delaware', 10, 'High School', 'ruth.cook@example.com', 'Visual Storytelling'),
('Scott', 'Morgan', 'Physics', 'Connecticut', 6, 'Middle School', 'scott.morgan@example.com', 'Scientific Inquiry'),
('Rebecca', 'Bell', 'English Literature', 'Wyoming', 5, 'College', 'rebecca.bell@example.com', 'Poetry Analysis'),
('Larry', 'Murphy', 'Chemistry', 'South Dakota', 7, 'High School', 'larry.murphy@example.com', 'Lab Investigations'),
('Michelle', 'Bailey', 'History', 'North Dakota', 8, 'Middle School', 'michelle.bailey@example.com', 'Field Research'),
('Eric', 'Rivera', 'Mathematics', 'West Virginia', 4, 'High School', 'eric.rivera@example.com', 'Number Theory'),
('Angela', 'Cooper', 'Biology', 'New Mexico', 1, 'Elementary', 'angela.cooper@example.com', 'Outdoor Experiments'),
('George', 'Richardson', 'Computer Science', 'Nevada', 9, 'College', 'george.richardson@example.com', 'App Development'),
('Melissa', 'Howard', 'Geography', 'Arizona', 3, 'High School', 'melissa.howard@example.com', 'Climate Studies'),
('Justin', 'Ward', 'Physical Education', 'Utah', 6, 'Middle School', 'justin.ward@example.com', 'Team Activities'),
('Katherine', 'Peterson', 'Art', 'Colorado', 2, 'Elementary', 'katherine.peterson@example.com', 'Color Theory');
