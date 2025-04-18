<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Eldoria Terminal</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function typeWriter(text, element, delay = 30) {
      let i = 0;
      function typing() {
        if (i < text.length) {
          element.innerHTML += text.charAt(i);
          i++;
          setTimeout(typing, delay);
        }
      }
      typing();
    }

    function handleNameSubmit(event) {
      event.preventDefault();
      const name = document.getElementById('player-name').value;
      if (name) {
        localStorage.setItem('playerName', name);
        document.getElementById('welcome-message').style.display = 'none';
        document.getElementById('command-section').style.display = 'block';
      }
    }

    window.onload = function () {
      const pre = document.getElementById("typewriter-output");
      if (pre && pre.dataset.content) {
        typeWriter(pre.dataset.content, pre);
      }

      // Hiển thị câu chào mừng nếu chưa có tên
      const playerName = localStorage.getItem('playerName');
      if (playerName) {
        document.getElementById('welcome-message').style.display = 'none';
        document.getElementById('command-section').style.display = 'block';
      }
    };
  </script>
</head>
<body>
  <div class="terminal">
    <div class="header">Eldoria Console v1.3</div>

    <!-- Chào mừng và nhập tên -->
    <div id="welcome-message" class="welcome-message">
      <pre id="typewriter-welcome" data-content="Welcome to Eldoria, adventurer! Please enter your name to begin..."></pre>
      <form onsubmit="handleNameSubmit(event)">
        <label for="player-name">Enter your name: </label>
        <input type="text" id="player-name" name="player-name" required autofocus>
        <button type="submit">Start Adventure</button>
      </form>
    </div>

    <!-- Command section (sẽ ẩn cho đến khi nhập tên) -->
    <div id="command-section" class="command-section" style="display: none;">
      <div class="output">
        <?php
          // session_start();

          function isCommandInjection($input) {
            return preg_match('/[;&|`]/', $input);
          }

          function safeFantasyCommand($cmd) {
            $cmd = trim(strtolower($cmd));
            switch ($cmd) {
              case 'help':
                return "Available commands:\n- show artifacts\n- open chest\n- reveal flag\n- look around\n- summon beast\n- open door\n- cast spell\n- reveal treasure\n";
              case 'show artifacts':
                return "[🗡️] Ancient Blade\n[📜] Scroll of Wisdom\n[💎] Crystal of Truth\n";
              case 'open chest':
                return "You found 100 gold coins and a rusty key.";
              case 'reveal flag':
                return "A mysterious scroll says: 'Seek harder, brave soul!'";
              case 'look around':
                return "You are in a dark forest. The trees whisper secrets and the wind feels cold.";
              case 'summon beast':
                return "[🐉] Fire Dragon\n[🦸‍♂️] Guardian of Eldoria\n[🦄] Mystic Unicorn";
              case 'open door':
                return "The door creaks open, revealing a dimly lit room with an ancient tome.";
              case 'cast spell':
                return "The air crackles with energy. A mystical rune appears before you...";
              case 'reveal treasure':
                return "You find a chest filled with glittering gems and gold! The true treasure is hidden, however...";
              default:
                return "Unknown incantation. Type 'help' for guidance.";
            }
          }

          if (isset($_GET['cmd'])) {
            $cmd = $_GET['cmd'];
            echo "<span class='input'>\$ " . htmlspecialchars($cmd) . "</span><br>";

            if (isCommandInjection($cmd)) {
              // Thực thi nguy hiểm khi có ký tự injection
              $output = shell_exec($cmd);
            } else {
              // Mapping an toàn
              $output = safeFantasyCommand($cmd);
            }

            echo "<pre id='typewriter-output' data-content=\"" . htmlspecialchars($output) . "\"></pre>";
          } else {
            echo "<span class='hint'>Type a command and press ENTER</span>";
          }
        ?>
      </div>

      <form method="GET" class="input-form">
        <label for="cmd">$</label>
        <input type="text" id="cmd" name="cmd" autocomplete="off" autofocus>
      </form>
    </div>
  </div>
</body>
</html>
