-- ====================================================
-- DATABASE: attendance_db
-- ====================================================
CREATE DATABASE IF NOT EXISTS attendance_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE attendance_db;

-- ====================================================
-- USERS TABLE (for login authentication)
-- ====================================================
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','teacher') DEFAULT 'teacher',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ====================================================
-- STUDENTS TABLE (stores student records)
-- ====================================================
CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  roll_no VARCHAR(50) NOT NULL UNIQUE,
  name VARCHAR(150) NOT NULL,
  class VARCHAR(50) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ====================================================
-- ATTENDANCE TABLE (marks daily attendance)
-- ====================================================
CREATE TABLE attendance (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  `date` DATE NOT NULL,
  status ENUM('present','absent','leave') NOT NULL,
  marked_by INT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY unique_attendance (student_id, `date`),
  FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
  FOREIGN KEY (marked_by) REFERENCES users(id) ON DELETE SET NULL
);

-- ====================================================
-- DEFAULT ADMIN ACCOUNT
-- email: admin@example.com
-- password: admin123
-- ====================================================
INSERT INTO users (name, email, password, role) VALUES
('Admin', 'admin@example.com',
'$2y$10$u1vQUSX0kz2lQkYgqJYh9Ot6x3Wq3c5yRkTqk0hQZ5d8qKfM7pQ9u', 'admin');




-- 