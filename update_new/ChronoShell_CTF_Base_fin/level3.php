<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ChronoShell - Level 3</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="terminal">
    <div class="header">🧠 Level 3: Mask of the Ancients</div>
    <div class="output">
      <?php
        if (isset($_POST['name'])) {
          $name = $_POST['name'];
          echo "<span class='input'>Invoking: " . htmlspecialchars($name) . "</span><br>";

          $cleaned = preg_replace('/[^a-z0-9 ]/i', '', $name);
          $output = shell_exec("ping -c 1 " . $cleaned);
          echo "<pre>" . htmlspecialchars($output) . "</pre>";
        } else {
          echo "<pre>Summon the ancient mask by POSTing 'name' to this page.</pre>";
        }
      ?>
    </div>
    <form method="POST">
      <label for="name">Summon Mask:</label>
      <input type="text" name="name" id="name" placeholder="dragon.local">
      <button type="submit">Summon</button>
    </form>
    <a href="index.php" style="color: #00ff88;">← Return to the Terminal</a>
  </div>
</body>
</html>
