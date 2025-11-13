<h2>Attendance Report</h2>

<form method="GET" action="">
  <input type="hidden" name="route" value="attendance/report">
  <label><strong>From:</strong></label>
  <input type="date" name="from" value="<?php echo htmlspecialchars($from); ?>">
  <label><strong>To:</strong></label>
  <input type="date" name="to" value="<?php echo htmlspecialchars($to); ?>">
  <input type="submit" value="View Report">
</form>

<table>
  <thead>
    <tr>
      <th>Roll No</th>
      <th>Name</th>
      <th>Presents</th>
      <th>Absents</th>
      <th>Leaves</th>
      <th>Attendance %</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($report)): ?>
      <?php foreach ($report as $row): 
        $total = $row['presents'] + $row['absents'] + $row['leaves'];
        $percent = $total > 0 ? round(($row['presents'] / $total) * 100, 2) : 0;
      ?>
        <tr>
          <td><?php echo htmlspecialchars($row['roll_no']); ?></td>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo $row['presents']; ?></td>
          <td><?php echo $row['absents']; ?></td>
          <td><?php echo $row['leaves']; ?></td>
          <td><?php echo $percent; ?>%</td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="6" style="text-align:center;">No records found for selected period.</td></tr>
    <?php endif; ?>
  </tbody>
</table>