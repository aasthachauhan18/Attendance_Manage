<h2>Edit Student</h2>

<form method="POST" action="?route=students/update&id=<?php echo $student['id']; ?>">
  <table>
    <tr>
      <td><label>Roll No:</label></td>
      <td>
        <input type="text" name="roll_no" value="<?php echo htmlspecialchars($student['roll_no']); ?>" required>
      </td>
    </tr>
    <tr>
      <td><label>Name:</label></td>
      <td>
        <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>
      </td>
    </tr>
    <tr>
      <td><label>Class:</label></td>
      <td>
        <input type="text" name="class" value="<?php echo htmlspecialchars($student['class']); ?>" required>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" value="Update">
        <a href="?route=students"><button type="button">Cancel</button></a>
      </td>
    </tr>
  </table>
</form>