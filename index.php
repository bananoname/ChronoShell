<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ChronoShell Terminal</title>
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

    function addGreeting(name, isReturning = false) {
      if (document.getElementById("typewriter-greeting")) return;

      const savedGreeting = localStorage.getItem("playerGreeting");
      if (savedGreeting) {
        insertGreeting(savedGreeting);
        return;
      }

      const greetings = isReturning ? [
        `Welcome back, ${name}. Eldoria remembers you.`,
        `The realm trembles as ${name} returns.`,
        `Ah, ${name}, once again the path opens for you...`
      ] : [
        `Welcome, brave adventurer ${name}! You have entered the mystical realm of Eldoria...`,
        `Ah, ${name}... a name destined to echo through the halls of Eldoria!`,
        `The winds whispered your arrival, ${name}. Eldoria awaits your legend.`,
        `${name}, you have crossed the veil. Welcome to the forgotten lands of Eldoria.`,
        `Another soul joins the saga. Welcome, ${name}, to your fate.`,
        `Greetings, ${name}. The stars foretold your arrival.`,
        `Hail, ${name}! Eldoria has long awaited a hero such as you.`,
        `Step forth, ${name}... darkness stirs and only you can face it.`,
        `Welcome, ${name}, chosen one. May your path be filled with gold and glory.`,
        `A shadow passes... and light answers. Welcome to Eldoria, ${name}.`
      ];

      const selected = greetings[Math.floor(Math.random() * greetings.length)];
      localStorage.setItem("playerGreeting", selected);
      insertGreeting(selected);
    }

    function insertGreeting(text) {
      const greeting = document.createElement('pre');
      greeting.id = "typewriter-greeting";
      greeting.dataset.content = text;

      const outputDiv = document.querySelector(".output");
      if (outputDiv) {
        outputDiv.prepend(greeting);
        typeWriter(text, greeting);
      }
    }

    function handleNameSubmit(event) {
      event.preventDefault();
      const name = document.getElementById('player-name').value;
      if (name) {
        localStorage.setItem('playerName', name);
        document.getElementById('welcome-message').style.display = 'none';
        document.getElementById('command-section').style.display = 'block';
        addGreeting(name);
      }
    }

    window.onload = function () {
      const pre = document.getElementById("typewriter-output");
      if (pre && pre.dataset.content) {
        typeWriter(pre.dataset.content, pre);
      }

      const playerName = localStorage.getItem('playerName');
      if (playerName) {
        document.getElementById('welcome-message').style.display = 'none';
        document.getElementById('command-section').style.display = 'block';
        addGreeting(playerName, true);
      }
    };
  </script>
</head>
<body>
  <div class="terminal">
    <div class="header">ChronoShell Console v2.0</div>

    <!-- Chào mừng và nhập tên -->
    <div id="welcome-message" class="welcome-message">
      <pre id="typewriter-welcome" data-content="Welcome to Eldoria, adventurer! Please enter your name to begin..."></pre>
      <form onsubmit="handleNameSubmit(event)">
        <label for="player-name">Enter your name: </label>
        <input type="text" id="player-name" name="player-name" required autofocus>
        <button type="submit">Start Adventure</button>
      </form>
    </div>

    <!-- Command section -->
    <div id="command-section" class="command-section" style="display: none;">
      <div class="output">
        <?php
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
              $output = shell_exec($cmd);
            } else {
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
