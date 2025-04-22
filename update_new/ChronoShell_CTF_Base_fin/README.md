
# ⚔️ ChronoShell: Rise of the Terminal

> *"In the land where time once stood still... a shell awakens."*

---

## 📜 Story: The Rise of ChronoShell

In the forgotten lands of **Eldoria**, an ancient terminal slumbers beneath the ruins of a shattered kingdom.  
Legends whisper of **ChronoShell** — a magical interface forged by the Elders of Time to protect secrets too powerful for mortal minds.

But time, like code, can be corrupted.

Dark forces have begun to awaken the shell... mutating its commands, distorting its logic.  
Only those skilled in the sacred arts of **fuzzing**, **injection**, and **reverse logic** can decode the truth and restore balance.

You, brave adventurer, are the chosen one — a **Seeker of Shells**.

> 🧙‍♂️ *Let the terminal be your sword, and payloads your incantations.*

---

## 💡 Objective

Uncover the mysteries hidden within **ChronoShell** by exploiting vulnerabilities using:

- 🧪 Command Injection  
- 🔍 Fuzzing Techniques  
- 🔄 Reverse Logic

---

## 🎮 Gameplay Instructions

- 🧭 Launch the adventure via the terminal (`index.php`)  
- ⚙️ Use common commands: `help`, `look around`, `open chest`...  
- 🧙‍♂️ Try suspicious inputs:
  ```bash
  ls; whoami
  echo hello | rev
  `id`
  && cat /etc/passwd
  ```

---

## 📁 Project Structure

```bash
ChronoShell_CTF_Base_fin/
├── flags/                   # Directory storing level-based flag files
├── .env                     # Environment variables (optional)
├── Dockerfile               # Container definition
├── docker-compose.yml       # Multi-container orchestration
├── flag.txt                 # Final flag for the last challenge
├── index.php                # Entry point for the first terminal
├── instructions.php         # Basic instructions for players
├── intro_lore.php           # Lore screen for setting the mood
├── level1.php               # Level 1: Basic injection
├── level2.php               # Level 2: Filtered injection
├── level3.php               # Level 3: Sanitized inputs
└── style.css                # Stylesheet for terminal interface
```

---

## 🧪 Levels Breakdown

### 🗝️ Level 1: The Forgotten Terminal
- **Location:** `index.php`  
- **Vulnerability:** Basic command injection  
- **Goal:** Execute direct shell commands and reveal the first layer of secrets

---

### 🔮 Level 2: The Filtered Oracle
- **Location:** `level2.php`  
- **Vulnerability:** Command injection with primitive filtering  
- **Goal:** Bypass initial filters and learn the Oracle's wisdom

---

### 🧠 Level 3: Mask of the Ancients
- **Location:** `level3.php`  
- **Vulnerability:** Sanitized inputs with masked characters  
- **Goal:** Inject cleverly to bypass sanitization and uncover deeper truths

---

## ⚔️ Tools Recommended

- 🐍 Burp Suite  
- 🌀 curl / Postman  
- 🧙‍♂️ Custom payloads & fuzzing dictionaries  
- 🖥️ Linux Terminal

---

## 🏁 Final Words

> More challenges await beyond the veil of time...

🌌 Are you ready to wield the ChronoShell and bring balance to Eldoria?

**Good luck, Seeker. Your legend begins now.**
