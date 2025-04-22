<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ChronoShell - Level 2</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="terminal">
    <div class="header">🧪 Level 2: The Filtered Oracle</div>
    <div class="output">
      <?php
        if (isset($_GET['say'])) {
          $input = $_GET['say'];
          echo "<span class='input'>You whisper: " . htmlspecialchars($input) . "</span><br>";
          
          // Filter most obvious injection characters
          if (preg_match('/[;&|`]/', $input)) {
            echo "<pre>The Oracle senses your deceit. Such symbols are forbidden.</pre>";
          } else {
            $output = shell_exec("echo " . escapeshellarg($input));
            echo "<pre>" . htmlspecialchars($output) . "</pre>";
          }
        } else {
          echo "<pre>Speak to the Oracle using ?say=YourMessage</pre>";
        }
      ?>
    </div>
    <a href="index.php" style="color: #00ff88;">← Return to the Terminal</a>
  </div>
</body>
</html>
