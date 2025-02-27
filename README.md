# 🏆 Franks Schachbrett

## 📌 Über das Projekt
Dieses Projekt implementiert ein **einfaches Schachbrett** mit PHP und HTML. Spieler können ihre Züge ausführen, und das Spiel speichert den Verlauf in einer Datei `spielverlauf.txt`. Die aktuelle Stellung wird aus dieser Datei geladen, um ein fortlaufendes Spiel zu ermöglichen.

---

## 🎯 Funktionen
✅ **Schachbrett-Rendering** mit HTML und CSS  
✅ **Speichern und Laden** des Spielverlaufs mit `spielverlauf.txt`  
✅ **Einfache Sitzungsverwaltung** mittels PHP `session_start()`  
✅ **Anzeige des aktuellen Spielstands** und der Anzahl der Züge  
✅ **Musikunterstützung** durch eine Audiodatei  
✅ **Integrierte Uhrzeit- und Datumsanzeige**  

---

## 🔧 Installation und Nutzung

### 📋 Voraussetzungen
🔹 Ein **Webserver** mit PHP-Unterstützung (z. B. Apache, XAMPP oder LAMP)  
🔹 Ein **Browser**, um das Schachbrett anzuzeigen  

### 📥 Installation
1. Lade die Projektdateien herunter oder klone das Repository:
   ```bash
   git clone https://github.com/dein-nutzername/franks-schachbrett.git
   ```
2. Kopiere die Dateien in das Webserver-Verzeichnis (z. B. `htdocs` bei XAMPP).
3. Stelle sicher, dass PHP aktiviert ist und der Webserver läuft.
4. Rufe die Datei `index.php` über den Browser auf:
   ```
   http://localhost/franks-schachbrett/
   ```

### 🎮 Spiel starten
🎲 **Schachbrett wird geladen**, und Spieler können ihre Züge durch Anklicken der Figuren ausführen.  
💾 **Die Zugfolge wird gespeichert**, sodass das Spiel fortgesetzt werden kann.  
📂 Falls `spielverlauf.txt` **nicht existiert**, wird das Spiel mit der Startaufstellung geladen.  

---

## 📂 Verzeichnisstruktur
```
📁 franks-schachbrett
├── 📄 index.php        # Hauptdatei mit dem Schachbrett und Spiellogik
├── 📄 spielfeld.php    # Enthält die Anzeige des Schachbretts
├── 📄 userbefragung.php # Fragt Spielereingaben ab
├── 🎨 stylemaster.css  # CSS-Styles für das Design
├── 📄 spielverlauf.txt # Datei zum Speichern des Spielverlaufs
├── 🖼️ hintergrund.jpg  # Hintergrundbild des Spiels
├── 🎭 *.png            # Bilddateien der Schachfiguren
└── 🎵 Sunny.mp3        # Hintergrundmusik
```

---

## 🛠️ Bekannte Probleme
⚠️ **Keine Validierung der Züge**  
⚠️ **Keine KI oder Multiplayer-Funktion**  
⚠️ **Speicherung erfolgt nur in `spielverlauf.txt`, keine Datenbank**  

---

## 🚀 Zukünftige Verbesserungen
🔹 Implementierung einer **Zugvalidierung**  
🔹 **Multiplayer-Funktionalität**  
🔹 Speicherung in einer **MySQL-Datenbank**  
🔹 **Verbesserte Benutzeroberfläche**  

---

## 📜 Lizenz
Dieses Projekt steht unter der **MIT-Lizenz**. Du kannst den Code frei verwenden, verändern und verbreiten.  

---

## ✨ Autor
👨‍💻 **Frank Panzer**  
🌐 **Website:** [Panzerit.de](http://panzerit.de)  
📧 **Kontakt:** [E-Mail](mailto:dev@panzerit.de)  

🚀 Viel Spaß beim Spielen! ♟️

