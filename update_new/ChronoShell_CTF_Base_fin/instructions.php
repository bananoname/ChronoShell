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
📜 Story: The Rise of ChronoShell

In the forgotten lands of Eldoria, an ancient terminal slumbers beneath the ruins of a shattered kingdom.
Legends whisper of ChronoShell — a magical interface forged by the Elders of Time to protect secrets too powerful for mortal minds.

But time, like code, can be corrupted.

Dark forces have begun to awaken the shell... mutating its commands, distorting its logic.
Only those skilled in the sacred arts of fuzzing, injection, and reverse logic can decode the truth and restore balance.

You, brave adventurer, are the chosen one — a Seeker of Shells.

Your mission: delve into ChronoShell, overcome its layers of deception, and uncover the final Flag of Eldoria.

Let the terminal be your sword, and payloads your incantations.

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

🗝️ Level 1: The Forgotten Terminal
  - Location: index.php
  - Vulnerability: Basic command injection via a pseudo-terminal
  - Goal: Execute commands directly, uncover the first secrets.

🔮 Level 2: The Filtered Oracle
  - Location: level2.php
  - Vulnerability: Command injection with basic filters on symbols
  - Goal: Bypass simple filters and retrieve the hidden wisdom of the Oracle.

🧠 Level 3: Mask of the Ancients
  - Location: level3.php
  - Vulnerability: Command injection with character sanitization
  - Goal: Inject cleverly by understanding how inputs are sanitized and masked.

More challenges await beyond the veil of time...

Good luck, adventurer.
    </pre>
    <a href="index.php" style="color: #00ff88;">← Return to the Terminal</a>
  </div>
</body>
</html>
