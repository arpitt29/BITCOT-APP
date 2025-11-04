<?php
include 'config.php';

echo "<h2>PHP Application Deployed via Jenkins on EC2 🚀</h2>";
echo "<p>Connection Status: Connected to RDS successfully!</p>";

// Optional: Fetch some data if you have a table
$result = $conn->query("SHOW TABLES");
if ($result) {
  echo "<h3>Available Tables:</h3><ul>";
  while ($row = $result->fetch_array()) {
    echo "<li>" . $row[0] . "</li>";
  }
  echo "</ul>";
}
?>
