<?php
session_start();
$Dateiname = "spielverlauf.txt";

$figuren = array(
    array('', '', '', '', '', '', '', '', '', ''),
    array('', 'turmw', 'pferdw', 'laeuferw', 'koenigw', 'damew', 'laeuferw', 'pferdw', 'turmw', ''),
    array('', 'bauerw', 'bauerw', 'bauerw', 'bauerw', 'bauerw', 'bauerw', 'bauerw', 'bauerw', ''),
    array('', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', ''),
    array('', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', ''),
    array('', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', ''),
    array('', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', 'leer', ''),
    array('', 'bauer', 'bauer', 'bauer', 'bauer', 'bauer', 'bauer', 'bauer', 'bauer', ''),
    array('', 'turm', 'pferd', 'laeufer', 'koenig', 'dame', 'laeufer', 'pferd', 'turm', ''),
    array('', '', '', '', '', '', '', '', '', ''),
);

ini_set("auto_detect_line_endings", true);

if (file_exists('spielverlauf.txt')) {
    if (filesize('spielverlauf.txt') > 0) {
        $lines = file('spielverlauf.txt');
        $lineCount = count($lines) - 1;
        $Spielstand = $lines[$lineCount];
        $figuren = unserialize($Spielstand);
    } else {
        echo "Datei ohne Inhalt";
    }
} else {
    echo "Datei nicht gefunden";
}

if (isset($_GET['vonspalte'])) {
    $von_zeile = $_GET['vonzeile'];
    $von_spalte = $_GET['vonspalte'];
    $nach_zeile = $_GET['nachzeile'];
    $nach_spalte = $_GET['nachspalte'];

    $figuren[$nach_zeile][$nach_spalte] = $figuren[$von_zeile][$von_spalte];
    $figuren[$von_zeile][$von_spalte] = 'leer';
}

$Dateizeiger = fopen('spielverlauf.txt', 'a+');
fputs($Dateizeiger, serialize($figuren));
fputs($Dateizeiger, "\r");
fclose($Dateizeiger);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="./stylemaster.css" type="text/css" rel="stylesheet">
    <title>Franks Schachbrett</title>
</head>
<body style="background-color: #1A030B; color: #FFFFFF; font-family: Arial, sans-serif;">
    <div style="text-align: center;">
        <h1>Franks Schachbrett</h1>
        <p>Heute ist der <?php echo date('d.m.Y'); ?> um <?php echo date('H:i'); ?> Uhr</p>

        <audio controls loop>
            <source src="Sunny.mp3" type="audio/mp3">
        </audio>
        
        <?php
        include "userbefragung.php";
        include "spielfeld.php";
        
        userbefragung();
        
        if (!isset($_SESSION['zaehler']))
            $_SESSION['zaehler'] = 0;

        if (isset($_GET['transportfeld'])) {
            $zaehler = $_GET['transportfeld'];
            $_SESSION['zaehler'] = ++$zaehler;
            if ($zaehler > 100) {
                session_destroy();
                $zaehler = 0;
            }
        } else {
            $zaehler = 0;
        }

        $spieler = $zaehler % 2;
        $farbe = ($spieler == 0) ? 'weiß' : 'schwarz';
        
        echo "<p>Dies ist Ihr $zaehler. Zug und es ist $farbe dran!</p>";
        ?>

        <form name="zaehler" action='' method='GET'>
            <input type='submit' value='Zug ausführen'>
            <input type='hidden' name='transportfeld' value="<?php echo $_SESSION['zaehler']; ?>">
        </form>
    </div>

    <div id="spielfeld" style="text-align: center;">
        <?php
        echo '<table style="border: 3px solid #0073ED; margin: auto; color: white;" cellspacing="0">';
        $zahl = -1;
        $horizontal = -1;
        
        foreach ($figuren as $zeile) {
            $zahl++;
            $horizontal++;
            $vertikal = 0;
            echo '<tr>';
            foreach ($zeile as $spalte) {
                if ($spalte == 'leer') {
                    echo '<td style="width: 50px; height: 50px; border: 1px solid white;"></td>';
                } else {
                    $vertikal++;
                    echo '<td style="width: 50px; height: 50px; border: 1px solid white;"><img src="' . $figuren[$horizontal][$vertikal] . '.png"></td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>

    <!-- Copyright -->
    <footer style="text-align: center; margin-top: 20px; font-size: 14px;">
        <p>
            &copy; <?php echo date("Y"); ?> Frank Panzer | <a href="https://panzerit.de" style="color: white; text-decoration: none;">PanzerIT.de</a> | Alle Rechte vorbehalten.
        </p>
    </footer>
</body>
</html>
