<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>How to Play</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="terminal">
    <div class="header">🛡️ CTF Instructions</div>
    <pre>
Welcome to ChronoShell.

💡 Objective:
  Discover vulnerabilities in the terminal interface using command injection and fuzzing techniques.

🎮 Gameplay:
  - Start the adventure via terminal (index.php)
  - Use commands like: help, look around, open chest...
  - Try crafting suspicious inputs like:
      ls; whoami
      echo hello | rev
      `id`
      && cat /etc/passwd

📍 Tips:
  - Start small. Inject with characters like `;`, `|`, `&&`
  - Watch how the system responds.
  - Use Burp Suite, curl, or a browser for fuzzing and analysis.
  - You may need to bypass filters in later levels...

🧪 Levels:
  - Level 1: Simple command injection via GET (?input=)
  - Level 2: Injection with basic filter bypass (?say=)
  - Level 3: POST-based injection with regex character filtering

🎯 Goal:
  Bypass filters, extract flags, escalate difficulty.

Good luck, adventurer.
    </pre>
    <a href="index.php" style="color: #00ff88;">← Return to the Terminal</a>
  </div>
</body>
</html>
