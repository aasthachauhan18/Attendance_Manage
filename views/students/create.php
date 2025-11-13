<h2>Add New Student</h2>

<form method="POST" action="?route=students/store">
  <table>
    <tr>
      <td><label>Roll No:</label></td>
      <td><input type="text" name="roll_no" required></td>
    </tr>
    <tr>
      <td><label>Name:</label></td>
      <td><input type="text" name="name" required></td>
    </tr>
    <tr>
      <td><label>Class:</label></td>
      <td><input type="text" name="class" required></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" value="Save">
        <a href="?route=students"><button type="button">Cancel</button></a>
      </td>
    </tr>
  </table>
</form>