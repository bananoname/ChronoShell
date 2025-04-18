
# 🧙 ChronoShell: Command Injection Lab

> A fantasy-themed terminal simulation designed for learning and exploiting Command Injection vulnerabilities.

---

## 🧠 Overview

**ChronoShell** is a CTF-style web lab that simulates a retro-fantasy terminal. Hidden within this magical shell is a vulnerability that allows brave hackers to exploit command injection and uncover the sacred flag.

The interface is styled like a mystical console from Eldoria, complete with glowing UI, typewriter effects, and hidden arcane prompts.

---

## ⚙️ Tech Stack

- **PHP 8.2 (Apache)**
- **HTML + CSS + Vanilla JS**
- **Dockerized for portability**

---

## 🚩 Challenge Goal

Your mission is to:
- Explore the terminal interface
- Interact with the input fields
- Discover and exploit a **command injection vulnerability**
- Retrieve the hidden flag located at:  
  ```
  /var/www/html/flag.txt
  ```

---

## 🚀 Setup Instructions

1. **Clone this repo**:
   ```bash
   git clone https://github.com/yourname/ChronoShell.git
   cd ChronoShell
   ```

2. **Build and run with Docker**:
   ```bash
   docker build -t chronoshell .
   docker run -p 8080:80 chronoshell
   ```

3. **Access the challenge**:
   Open your browser and go to:  
   `http://localhost:8080`

---

## 🧪 Testing the Injection

Try entering your name in the terminal input.  
Can you trick the shell into revealing more than just a greeting?

💡 Example:
```
ChronoHacker; ls
```

---

## 📁 File Structure

```
.
├── Dockerfile
├── index.php
├── style.css
├── flag.txt
└── README.md
```

---

## 📜 License & Usage

This lab is designed for **educational purposes only**.  
Feel free to use or modify it for teaching, workshops, or CTFs — with credit.

---

## 🌟 Credits

Inspired by the mystical realms of fantasy RPGs and the chaotic elegance of the shell.

Crafted with 💻 + 🧙 by Huy Anh Quach
