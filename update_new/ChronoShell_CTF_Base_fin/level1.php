<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ChronoShell - Level 1</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="terminal">
    <div class="header">🧩 Level 1: Echoes of Injection</div>
    <div class="output">
      <?php
        if (isset($_GET['input'])) {
          $input = $_GET['input'];
          echo "<span class='input'>You said: " . htmlspecialchars($input) . "</span><br>";
          if (preg_match('/[;&|]/', $input)) {
            $output = shell_exec("echo " . $input);
          } else {
            $output = "The realm echoes: " . $input;
          }
          echo "<pre>" . htmlspecialchars($output) . "</pre>";
        } else {
          echo "<pre>Speak your mind, adventurer. Use the ?input= in the URL to begin.</pre>";
        }
      ?>
    </div>
    <a href="index.php" style="color: #00ff88;">← Return to the Terminal</a>
  </div>
</body>
</html>
