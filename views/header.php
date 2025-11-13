<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Management System</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f6f7fb;
    }
    nav {
      background-color: #34495e;
      padding: 10px;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      margin-right: 15px;
      font-weight: bold;
    }
    nav a:hover {
      text-decoration: underline;
    }
    .container {
      padding: 20px;
    }
    h2 {
      color: #2c3e50;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f0f0f0;
    }
    button, input[type="submit"] {
      padding: 6px 12px;
      background-color: #2ecc71;
      border: none;
      border-radius: 4px;
      color: white;
      cursor: pointer;
    }
    button:hover, input[type="submit"]:hover {
      background-color: #27ae60;
    }
    .error {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>

<nav>
  <a href="<?php echo BASE_URL . '?route=dashboard'; ?>">Dashboard</a>
  <a href="<?php echo BASE_URL . '?route=students'; ?>">Students</a>
  <a href="<?php echo BASE_URL . '?route=attendance/mark'; ?>">Mark Attendance</a>
  <a href="<?php echo BASE_URL . '?route=attendance/report'; ?>">Reports</a>
  <a href="<?php echo BASE_URL . '?route=logout'; ?>" style="float:right;">Logout</a>
</nav>

<div class="container"></div>