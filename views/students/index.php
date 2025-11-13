<h2>Students List</h2>

<a href="<?php echo BASE_URL; ?>?route=students/create">
  <button>Add New Student</button>
</a>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Roll No</th>
      <th>Name</th>
      <th>Class</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($students)): ?>
      <?php foreach ($students as $student): ?>
        <tr>
          <td><?php echo $student['id']; ?></td>
          <td><?php echo htmlspecialchars($student['roll_no']); ?></td>
          <td><?php echo htmlspecialchars($student['name']); ?></td>
          <td><?php echo htmlspecialchars($student['class']); ?></td>
          <td>
            <a href="<?php echo BASE_URL; ?>?route=students/edit&id=<?php echo $student['id']; ?>"><button>Edit</button></a>
            <a href="<?php echo BASE_URL; ?>?route=students/delete&id=<?php echo $student['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">
              <button style="background-color:#e74c3c;">Delete</button>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" style="text-align:center;">No students found.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>