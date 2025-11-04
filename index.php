<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($conn, $query)) {
        echo "<p style='color:green;'>✅ User added successfully!</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
}

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head><title>PHP RDS Demo</title></head>
<body>
<h1 style="color:red;"> Bitcot PHP + AWS RDS Demo (Auto Deployed)</h1>

<h2>Add New User</h2>
<form method="POST">
  Name: <input type="text" name="name"><br>
  Email: <input type="text" name="email"><br>
  <input type="submit" value="Add User">
</form>

<h2>Users List</h2>
<table border="1">
  <tr><th>Name</th><th>Email</th></tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr><td><?= htmlspecialchars($row['name']) ?></td><td><?= htmlspecialchars($row['email']) ?></td></tr>
  <?php } ?>
</table>
</body>
</html>
