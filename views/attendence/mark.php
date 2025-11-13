<h2>Mark Attendance</h2>

<form method="POST" action="<?php echo BASE_URL . '?route=attendance/store'; ?>">
  <label for="date"><strong>Date:</strong></label>
  <input type="date" name="date" id="date" value="<?php echo htmlspecialchars($date); ?>" required>
  <input type="submit" value="Save Attendance">
  <br><br>

  <table>
    <thead>
      <tr>
        <th>Roll No</th>
        <th>Name</th>
        <th>Class</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($students)): ?>
        <?php foreach ($students as $s): 
          $status = $indexed[$s['id']]['status'] ?? ''; ?>
          <tr>
            <td><?php echo htmlspecialchars($s['roll_no']); ?></td>
            <td><?php echo htmlspecialchars($s['name']); ?></td>
            <td><?php echo htmlspecialchars($s['class']); ?></td>
            <td>
              <label>
                <input type="radio" name="status[<?php echo $s['id']; ?>]" value="present" 
                  <?php if ($status == 'present') echo 'checked'; ?>> Present
              </label>
              <label>
                <input type="radio" name="status[<?php echo $s['id']; ?>]" value="absent" 
                  <?php if ($status == 'absent') echo 'checked'; ?>> Absent
              </label>
              <label>
                <input type="radio" name="status[<?php echo $s['id']; ?>]" value="leave" 
                  <?php if ($status == 'leave') echo 'checked'; ?>> Leave
              </label>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="4" style="text-align:center;">No students found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</form>